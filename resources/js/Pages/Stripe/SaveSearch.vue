<template>
    <div id="saveSearchModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Save Search Script</h5>
                    <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-form-label" for="search_name">Search Label:</label>
                                <input type="text" id="search_name" v-model="search_name" class="form-control"
                                    :class="{ 'error-class': errors.search_name }" placeholder="Search Label">
                                <InputError class="mt-2" :message="errors.search_name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label class="col-form-label" for="eventId">Old Event:</label>
                                <input type="text" id="eventId" :value="oldCampName" class="form-control" readonly>

                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="col-form-label" for="playerId">Old Player:</label>
                                <input type="text" id="playerId" :value="oldPlayerName" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="fromDate">From Date:</label>
                                <input type="text" id="fromDate" :value="fromDateComp" class="form-control" readonly
                                    placeholder="YYYY-MM-DD">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="toDate">To Date:</label>
                                <input type="text" id="toDate" :value="toDateComp" class="form-control" readonly
                                    placeholder="YYYY-MM-DD">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="col-form-label" for="toAmount">From Amount:</label>
                                <input type="text" id="fromAmount" :value="fromAmount" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="col-form-label" for="toAmount">To Amount:</label>
                                <input type="text" id="toAmount" :value="toAmount" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="col-form-label" for="newEvent">New Event:</label>
                                <input type="text" id="newEvent" :value="campName" class="form-control"
                                    :class="{ 'error-class': errors.camp_player }" readonly>
                                <!-- <InputError class="mt-2" :message="errors.camp_player" /> -->

                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="col-form-label" for="newPlayer">New Player:</label>
                                <input type="text" id="newPlayer" :value="playerName" class="form-control"
                                    :class="{ 'error-class': errors.camp_player }" readonly>
                                <!-- <InputError class="mt-2" :message="errors.camp_player" /> -->
                            </div>
                        </div>
                        <div class="row mt-5" v-if="errors.camp_player || errors.old_camp_player">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                    v-if="errors.camp_player">
                                    {{ errors.camp_player }}
                                </div>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                    v-if="errors.old_camp_player">
                                    {{ errors.old_camp_player }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script setup>
import InputError from '@/Components/InputError.vue';
import { ref, toRef, watch, computed, reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import moment from 'moment'

const props = defineProps({
    propCampId: {
        type: [Number, String],
        required: true,
    },
    propPlayerId: {
        type: [Number, String],
        required: true,
    },
    propToAmount: {
        type: [Number, String],
        required: true,
    },
    propFromAmount: {
        type: [Number, String],
        required: true,
    },
    propFromDate: {
        type: [Date, String],
        required: true,
    },
    propToDate: {
        type: [Date, String],
        required: true,
    },
    propOldCampName: {
        type: String,
        required: true,
    },
    propOldPlayerName: {
        type: String,
        required: true,
    },
    propCamps: {
        type: Array,
        required: true,
    },
    propPlayers: {
        type: Array,
        required: true,
    },
});

const campId = toRef(props, 'propCampId')
const playerId = toRef(props, 'propPlayerId');
const campName = ref('');
const playerName = ref('');

const search_name = ref('');
const oldPlayerName = toRef(props, 'propOldPlayerName');
const oldCampName = toRef(props, 'propOldCampName');
const fromDate = toRef(props, 'propFromDate');
const toDate = toRef(props, 'propToDate');
const fromAmount = toRef(props, 'propFromAmount');
const toAmount = toRef(props, 'propToAmount');

const fromDateComp = computed(() => {
    return props.propFromDate !== '' ? moment(props.propFromDate).format('M-D-YYYY') : '';
});

const toDateComp = computed(() => {
    return props.propToDate !== '' ? moment(props.propToDate).format('M-D-YYYY') : '';
});

watch(() => props.propCampId, () => {
    let camp = props.propCamps.find((event) => event.id === props.propCampId);
    if (camp) campName.value = camp.name;
});

watch(() => props.propPlayerId, () => {
    let player = props.propPlayers.find((player) => player.id === props.propPlayerId);
    if (player) playerName.value = player.user.first_name + ' ' + player.user.last_name;
});

const errors = ref({});

const validateForm = () => {
    let formIsValid = true;
    errors.value = {};

    // Perform validation for each field

    if (!search_name.value.trim()) {
        errors.value.search_name = 'Search name is required.';
        formIsValid = false;
    }

    // Validate either camp or player, but not both
    const campIsEmpty = !campId.value;
    const playerIsEmpty = !playerId.value;

    if (campIsEmpty && playerIsEmpty) {
        errors.value.camp_player = 'Please choose either a new event or a new player.';
        formIsValid = false;
    }

    const oldCampIsEmpty = !oldCampName.value;
    const oldPlayerIsEmpty = !oldPlayerName.value;

    if (oldCampIsEmpty && oldPlayerIsEmpty) {
        errors.value.old_camp_player = 'Please choose either an old event or an old player.';
        formIsValid = false;
    }

    // Add validation for other fields here

    return formIsValid;
};


const submit = () => {

    if (validateForm()) {
        const data = {
            search_name: search_name.value,
            camp_id: campId.value,
            player_id: playerId.value,
            fromDate: fromDate.value,
            toDate: toDate.value,
            fromAmount: fromAmount.value,
            toAmount: toAmount.value,
            oldCampName: oldCampName.value,
            oldPlayerName: oldPlayerName.value,
        };

        router.post(route('search-filters.store'), data, {
            preserveScroll: true,
            preserveState: false,
            onSuccess: () => {
                document.querySelector('.close-button').click();
            },
        });

        document.querySelector('.close-button').click();
    }
};


</script>