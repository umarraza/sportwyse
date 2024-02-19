<?php

namespace App\Import;

use Carbon\Carbon;
use App\Models\Camp;
use App\Models\Team;

class TeamsImport
{
    public static function import($team, $club)
    {
        $createdAt = (array) $team->createdAt;
        $updatedAt = (array) $team->updatedAt;

        $startDate = isset($team->startDate) ? (array) $team->startDate : false;
        $endDate = isset($team->endDate) ? (array) $team->endDate : false;

        $startDate = $startDate ? Carbon::parse($startDate['$date']) : now();
        $endDate = $endDate ? Carbon::parse($endDate['$date']) : now();

        $team = $club->teams()->create([
            'm_id' => $team->_id,
            'activity_id' => 1,
            'show_team' => $team->showTeam,
            'is_visible' => $team->isVisible,
            'is_archived' => $team->isArchived,
            'is_removed' => $team->isRemoved,
            'm_club_id' => $team->clubId,
            'm_players_ids' => count($team->players) ? json_encode($team->players) : null,
            'm_staff_member_ids' => count($team->staffMemberId) ? json_encode($team->staffMemberId) : null,
            'gender' => isset($team->gender) ? $team->gender : null,
            'name' => $team->name,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'activity' => $team->activity,
            'discount_amounts' => count($team->discountAmounts) ? json_encode($team->discountAmounts) : null,
            'created_at' => isset($startingAt['$date']) ? Carbon::parse($createdAt['$date']) : now(),
            'updated_at' => isset($startingAt['$date']) ? Carbon::parse($updatedAt['$date']) : now(),
        ]);
    }
}
