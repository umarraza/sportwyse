<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: 'mike@sanjoserush.com',
  password: 'password',
  remember: false,
});

const submit = () => {
  form.transform(data => ({
    ...data,
    remember: form.remember ? 'on' : '',
  })).post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <Head title="Log in" />
  <div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        <Link :href="route('admin.login')"
          class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
        Admin Log in</Link>

        <Link :href="route('login')"
          class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ml-2">
        Log in</Link>
    </div>
    <AuthenticationCard>
      <template #logo>
        <AuthenticationCardLogo />
      </template>
      <div class="card-body">
        <h5 class="font-18 text-center">Sign in to continue to SportWyse.</h5>
        <form class="form-horizontal m-t-30" @submit.prevent="submit">
          <div class="form-group">
            <div class="col-12">
              <InputLabel for="email" value="Email" />
              <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full"  autofocus
                autocomplete="username" />
              <InputError class="mt-2" :message="form.errors.email" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-12">
              <InputLabel for="password" value="Password" />
              <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" 
                autocomplete="current-password" />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-12">
              <div class="checkbox checkbox-primary">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1"> Remember me</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group text-center m-t-20">
            <div class="col-12">
              <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Log in
              </PrimaryButton>
            </div>
          </div>
          <div class="form-group row m-t-30 m-b-0">
            <div class="col-sm-7">
              <Link v-if="canResetPassword" :href="route('password.request')" class="text-muted">
              Forgot your password?
              </Link>
            </div>
            <Link v-if="canRegister" :href="route('register')"
              class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Register</Link>
          </div>
        </form>
      </div>
    </AuthenticationCard>
  </div>
</template>

<style>
.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}
</style>