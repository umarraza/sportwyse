<?php

namespace App\Import;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersImport
{
    public static function import($model, $club)
    {
        $userByEmail = User::where('email', $model->data->email)->first();

        $createdAt = (array) $model->createdAt;
        $updatedAt = (array) $model->updatedAt;

        if (!$userByEmail) {

            $user = User::create([
                'first_name'        => $model->data->firstName,
                'last_name'         => $model->data->lastName,
                'username'          => $model->data->username,
                'email'             => $model->data->email,
                'password'          => Hash::make('password'),
                'm_id'              => $model->_id,
                'm_club_id'         => $model->clubId,
                'm_rush_user_type'  => $model->data->rushUserType,
                'm_files'           => json_encode($model->data->files),
                'm_club_name'       => $model->clubName,
                'created_at'        => !is_null($model->createdAt) ? Carbon::parse($createdAt['$date']) : now(),
                'updated_at'        => !is_null($model->updatedAt) ? Carbon::parse($updatedAt['$date']) : now(),
            ]);

            if ($model->data->rushUserType === 'staff') {

                $user->staff()->create([
                    'club_id'   => $club->id,
                    'm_id'      => $model->_id,
                    'phone'     => $model->data->phone
                ]);

                $user->assignRole('Staff');
            }

            if ($model->data->rushUserType === 'adult') {

                $guardian                     = $user->guardian()->create([
                    'phone'                   => $model->data->phone,
                    'club_id'                 => $club->id,
                    'relationship_with_child' => isset($model->data->relationShipWithChild) ? $model->data->relationShipWithChild : null,
                ]);

                $user->assignRole('Parent');

                collect($model->child)->each(function ($child) use ($guardian, $model, $club) {

                    $data = $child->data;

                    if (isset($data->playerEmail) && $data->playerEmail) {

                        $userByEmail = User::where('email', $data->playerEmail)->first();

                        if (!$userByEmail) {
                            
                            $user = User::create([
                                'm_id'          => $child->_id,
                                'first_name'    => $data->firstName,
                                'last_name'     => $data->lastName,
                                'email'         => $data->playerEmail ?? Str::random('5') . "@gmail.com",
                                'password'      => Hash::make('password'),
                            ]);

                            $user->assignRole('Player');

                            $medicalInformationReleaseHIPPA = isset($data->medicalInformationReleaseHIPPA) ? filter_var($data->medicalInformationReleaseHIPPA, FILTER_VALIDATE_BOOLEAN) : false;
                            $consentforTreatment = isset($data->consentforTreatment) ? filter_var($data->consentforTreatment, FILTER_VALIDATE_BOOLEAN) : false;
                            $acceptanceofRisk = isset($data->acceptanceofRisk) ? filter_var($data->acceptanceofRisk, FILTER_VALIDATE_BOOLEAN) : false;
                            $refundPolicy = isset($data->refundPolicy) ? filter_var($data->refundPolicy, FILTER_VALIDATE_BOOLEAN) : false;
                            $delinquentPaymentPolicy = isset($data->delinquentPaymentPolicy) ? filter_var($data->delinquentPaymentPolicy, FILTER_VALIDATE_BOOLEAN) : false;
                            $concussionInformationSheet = isset($data->concussionInformationSheet) ? filter_var($data->concussionInformationSheet, FILTER_VALIDATE_BOOLEAN) : false;
                            $concussionInformationAcknowledgement = isset($data->concussionInformationAcknowledgement) ? filter_var($data->concussionInformationAcknowledgement, FILTER_VALIDATE_BOOLEAN) : false;
                            $appearanceAgreement = isset($data->appearanceAgreement) ? filter_var($data->appearanceAgreement, FILTER_VALIDATE_BOOLEAN) : false;

                            $user->player()->create([
                                'club_id'                                => $club->id,
                                'm_id'                                   => $child->_id,
                                'guardian_id'                            => $guardian->id,
                                'm_teams'                                => count($child->teams) ? json_encode($child->teams) : null,
                                'birth_date'                             => Carbon::parse($data->birthday),
                                'phone'                                  => isset($data->playerPhone) ? $data->playerPhone : null,
                                'gender'                                 => isset($data->gender) ? $data->gender : null,
                                'medical_information_release_HIPPA'      => $medicalInformationReleaseHIPPA,
                                'consent_for_treatment'                  => $consentforTreatment,
                                'acceptance_of_risk'                     => $acceptanceofRisk,
                                'refund_policy'                          => $refundPolicy,
                                'delinquent_payment_policy'              => $delinquentPaymentPolicy,
                                'concussion_information_sheet'           => $concussionInformationSheet,
                                'concussion_information_acknowledgement' => $concussionInformationAcknowledgement,
                                'appearance_agreement'                   => $appearanceAgreement,
                                'm_parent_id'                            => isset($data->parentId) ? $data->parentId : null,
                                'm_parent_ids'                           => isset($data->parentIds) ? json_encode($data->parentIds) : null,
                                'm_club_id'                              => isset($data->clubId) ? $data->clubId : null ,
                                'm_club_name'                            => isset($data->clubName) ? $data->clubName : null ,
                                'm_username'                             => isset($data->username) ? $data->username : null ,
                                'm_files'                                => count($data->files) ? json_encode($data->files) : null,
                                'm_camps'                                => count($model->camps) ? json_encode($model->camps) : null,
                            ]);
                        }
                    }
                });
            }
        }
    }
}