<template>
    <div id="runBatchScriptsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel"><i class="fa fa-terminal"></i> Run Batch Scripts</h5>
                    <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="submit">
                    <div class="modal-body">
                        <ul v-if="prop_scripts.length">
                            <li v-for="(script, index) in prop_scripts" :key="index">
                                <div class="custom-control custom-checkbox pl-5 pt-4 pb-4">
                                    <input type="checkbox" class="custom-control-input" :id="script.id"
                                        data-parsley-multiple="groups" data-parsley-mincheck="2" :value="script.id" v-model="checkedScripts">
                                    <label class="custom-control-label" :for="script.id">{{ script.search_name
                                    }}</label>
                                </div>
                                <div class="additional-info">
                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <th>Event Name (New):</th>
                                            <td>{{ script.camp.name }}</td>
                                            <th>Player Name (New):</th>
                                            <td v-if="script.player">{{ script.player.user.first_name + ' ' + script.player.user.last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Event Name (Old):</th>
                                            <td>{{ script.event_name }}</td>
                                            <th>Player Name (Old):</th>
                                            <td>{{ script.player_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>From Date:</th>
                                            <td>{{ script.from_date }}</td>
                                            <th>To Date:</th>
                                            <td>{{ script.to_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>From Amount:</th>
                                            <td>{{ script.from_amount }}</td>
                                            <th>To Amount:</th>
                                            <td>{{ script.to_amount }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </li>
                        </ul>
                        <p v-else class="text-center">No scripts found!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn waves-effect waves-light" :disabled="!prop_scripts.length" :class="[prop_scripts.length ? 'btn-primary' : 'btn-light disabled']"><i class="fa fa-terminal"></i> Run</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    prop_scripts: {
        type: Object,
        required: true,
    },
});

const checkedScripts = ref([]);

const submit = () => {

    const data = {
        scripts: checkedScripts.value,
    };

    router.post(route('search-filters.run'), data, {
        preserveScroll: true,
        preserveState: false,
        onSuccess: () => {
        },
    });

    document.querySelector('.close-button').click();
};


</script>

<style scoped>
.additional-info {
    margin-left: 20px;
    /* Add some indentation to separate it from the checkbox */
    padding: 10px;
    /* Add padding for better spacing */
    background-color: #f2f2f2;
    /* Add a background color to distinguish it */
    border-radius: 5px;
    /* Add rounded corners for a nicer look */
    border: 1px solid #ccc;
    /* Add a border for visual separation */
}</style>