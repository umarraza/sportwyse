<script setup>
import AppLayout from '../Parent/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout title="Parent Dashboard">
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title">Parent Dashboard</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item active">Parent Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h3 class="text-center page-title">Show Stats Here</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
