<template>
    <div id="saveSearchModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Save Search Script {{ campId }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <label class="col-form-label" for="searchName">Search Label:</label>
                        <input type="text" id="searchName" v-model="serachForm.searchName" class="form-control"
                         placeholder="Search Label">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label class="col-form-label" for="eventId">Old Event:</label>
                            <input type="text" id="eventId" :value="oldCampName" class="form-control"
                                readonly placeholder="">

                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="col-form-label" for="playerId">Old Player:</label>
                            <input type="text" id="playerId" :value="oldPlayerName" class="form-control"
                                readonly placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="fromDate">From Date:</label>
                            <input type="text" id="fromDate" :value="prop_filters.fromDate" class="form-control"
                                readonly placeholder="YYYY-MM-DD">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="toDate">To Date:</label>
                            <input type="text" id="toDate" :value="prop_filters.toDate" class="form-control" readonly
                                placeholder="YYYY-MM-DD">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="col-form-label" for="toAmount">From Amount:</label>
                            <input type="text" id="fromAmount" :value="prop_filters.fromAmount" class="form-control"
                                readonly placeholder="">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="col-form-label" for="toAmount">To Amount:</label>
                            <input type="text" id="toAmount" :value="prop_filters.toAmount" class="form-control"
                                readonly placeholder="">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="col-form-label" for="newEvent">New Event:</label>
                            <input type="text" id="newEvent" :value="campName" class="form-control"
                                readonly placeholder="">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="col-form-label" for="newPlayer">New Player:</label>
                            <input type="text" id="newPlayer" :value="playerName" class="form-control"
                                readonly placeholder="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps({
    prop_filters: {
        type: Object,
        required: true
    },
    prop_camp_id: {
        type: [Number, String],
        required: true
    },
    prop_player_id: {
        type: [Number, String],
        required: true
    },
    camps: {
        type: Array,
        required: true
    },
    players: {
        type: Array,
        required: true
    },
    uniqueEvents: {
        type: Array,
        required: true
    },
    uniquePlayers: {
        type: Array,
        required: true
    }
});

const campId = ref(props.prop_camp_id);
const campName = ref('');
const playerName = ref('');

const oldCampName = ref('');
const oldPlayerName = ref('');

watch(() => props.prop_camp_id, () => {
    let camp = props.camps.find((event) => event.id === props.prop_camp_id);
    if (camp) campName.value = camp.name;
});

watch(() => props.prop_player_id, () => {
    let player = props.players.find((event) => event.id === props.prop_player_id);
    if (player) playerName.value = player.user.first_name + ' ' + player.user.last_name;
});

watch(() => props.prop_filters.eventId, () => {
    let camp = props.uniqueEvents.find((event) => event.value === props.prop_filters.eventId);
    if (camp) oldCampName.value = camp.text;
});

watch(() => props.prop_filters.playerId, () => {
    let player = props.uniquePlayers.find((event) => event.value === props.prop_filters.playerId);
    if (player) oldPlayerName.value = player.text;
});


const serachForm = useForm({
    searchName: '',
    camp_id: props.prop_camp_id,
    player_id: props.prop_player_id,
    eventId: props.prop_filters.eventId,
    playerId: props.prop_filters.playerId,
    fromDate: props.prop_filters.fromDate,
    toDate: props.prop_filters.toDate,
    fromAmount: props.prop_filters.fromAmount,
    toAmount: props.prop_filters.toAmount,
});

</script>