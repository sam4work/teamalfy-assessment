<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Components/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import JetButton from '@/Components/Button.vue';
import JetInput from '@/Components/Input.vue';
import JetCheckbox from '@/Components/Checkbox.vue';
import JetLabel from '@/Components/Label.vue';
import JetValidationErrors from '@/Components/ValidationErrors.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
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


  <div class="grid grid-cols-6 lg:grid-cols-12 min-h-screen max-w-7xl mx-auto">


    <form class=" col-span-full lg:col-span-5 px-4 py-2  lg:px-2  flex flex-col justify-center" @submit.prevent="submit">

      <JetValidationErrors class=""/>

      <h2 class="text-xl md:text-4xl my-5">
        Welcome Back
      </h2>


      <hr class="">
      <section class="grid  grid-cols-12 gap-4 my-5 ">



        <div class="col-span-full ">
          <JetLabel for="email" class="sr-only" value="Email"/>
          <JetInput
              id="-username"
              v-model="form.email"
              type="text"
              class="mt-1 block w-full"
              placeholder="Email/ Username"

              required
          />
        </div>

        <div class="col-span-full ">
          <JetLabel for="password" class="sr-only" value="Password"/>
          <JetInput
              id="password"
              v-model="form.password"
              type="password"
              class="mt-1 block w-full"
              required
              placeholder="Password"
              autocomplete="new-password"
          />
        </div>

        <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
          <JetLabel for="terms">
            <div class="flex items-center">
              <JetCheckbox id="terms" v-model:checked="form.terms" name="terms"/>

              <div class="ml-2">
                I agree to the <a target="_blank" :href="route('terms.show')"
                                  class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and
                <a
                    target="_blank" :href="route('policy.show')"
                    class="underline text-sm text-gray-600 hover:text-gray-900">Privacy
                  Policy</a>
              </div>
            </div>
          </JetLabel>
        </div>

        <div class="col-span-12 flex items-center justify-end mt-4">

          <button class="bg-red-300 w-full rounded-lg p-2 font-bold" :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing">
            Login
          </button>
        </div>

        <div class="col-span-full  flex items-center  ">
          <span class="text-gray-400">Don't have an account? </span>
          <Link :href="route('register')" class="underline  hover:text-gray-900">
            Register
          </Link>

        </div>
        <div class="col-span-full  flex items-center  ">
          <span class="text-gray-400">Forgot Password? </span>
          <Link :href="route('password.request')" class="underline  hover:text-gray-900">
            Reset Password
          </Link>

        </div>

      </section>

    </form>

    <div class="col-span-full md:col-span-7   flex p-5">

      <div class=" w-full flex flex-col md:flex-row space-x-5  items-center relative">

        <div class="absolute h-full w-10/12 right-0 bg-gray-100 rounded-lg"/>

        <div class="h-full  relative">
          <img src="/storage/images/back-8.jpeg" class="rounded-lg" alt="Lady On Swing">
        </div>

        <div class="flex flex-col space-y-5  relative">
          <img class="w-[500px] rounded-lg" src="/storage/images/back-7.png" alt="Lady On Swing">
          <img class="w-[500px] rounded-lg" src="/storage/images/back-6.jpeg" alt="Lady On Swing">
        </div>

      </div>

    </div>
  </div>

</template>
