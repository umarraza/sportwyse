<script setup>
import AppLayout from '@/Pages/Club/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <AppLayout title="Dashboard">
    <div class="page-title-box">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-right">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-heading p-4">
            <div class="mini-stat-icon float-right">
              <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
            </div>
            <div>
              <h5 class="font-16">Total Adult Membership Registered</h5>
            </div>
            <h3 class="mt-4">0</h3>
            <div class="progress mt-4" style="height: 4px;">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-heading p-4">
            <div class="mini-stat-icon float-right">
              <i class="mdi mdi-briefcase-check bg-success text-white"></i>
            </div>
            <div>
              <h5 class="font-16">Total Child Membership Registered</h5>
            </div>
            <h3 class="mt-4">0</h3>
            <div class="progress mt-4" style="height: 4px;">
              <div class="progress-bar bg-success" role="progressbar" style="width: 1%" aria-valuenow="88"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">1%</span></p>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-heading p-4">
            <div class="mini-stat-icon float-right">
              <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
            </div>
            <div>
              <h5 class="font-16">Invoiced</h5>
            </div>
            <h3 class="mt-4">$0</h3>
            <div class="progress mt-4" style="height: 4px;">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3">
        <div class="card">
          <div class="card-heading p-4">
            <div class="mini-stat-icon float-right">
              <i class="mdi mdi-buffer bg-danger text-white"></i>
            </div>
            <div>
              <h5 class="font-16">Stripe Balance</h5>
            </div>
            <h3 class="mt-4">$0</h3>
            <div class="progress mt-4" style="height: 4px;">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <Link :href="route('import')" class="btn btn-success">
        Import
        </Link>
      </div>
    </div>
  </AppLayout>
</template>
