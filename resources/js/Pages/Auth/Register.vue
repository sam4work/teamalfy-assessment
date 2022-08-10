<script setup>
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import JetInput from '@/Components/Input.vue';
import JetCheckbox from '@/Components/Checkbox.vue';
import JetLabel from '@/Components/Label.vue';
import JetValidationErrors from '@/Components/ValidationErrors.vue';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import {onMounted, ref} from "vue";

const photo = ref(null)

onMounted(() => {
  const openFileInput = () => {
    photo.click()
  }
})

const handleFileInputChange = () => {
  console.log(photo)
}


const form = useForm({
  photo: null,
  name: '',
  username: '',
  dob: '',
  nationality: '',
  email: '',
  phoneNumber: '',
  password: '',
  password_confirmation: '',
  bio: '',
  terms: false,
});

const submit = () => {
  form.post(route('register'), {
    // onFinish: () => form.reset('password'),
  });
};


</script>

<template>
  <Head title="Register"/>


  <div class="grid grid-cols-6 lg:grid-cols-12 min-h-screen max-w-7xl mx-auto">


    <form class="col-span-5 px-4 py-2  lg:px-2  flex flex-col" @submit.prevent="submit">

      <JetValidationErrors class=""/>

      <h2 class="text-xl md:text-4xl">
        Become a part of the <br>
        Luxe Tribes!
      </h2>


      <section class="grid grid-cols-6 md:grid-cols-12 gap-4 my-5">
        <div class="col-span-full flex space-x-5">

          <div class="h-20 w-20 rounded-full bg-gray-300 flex items-center justify-center">
            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path
                  d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
            </svg>
          </div>

          <div>
            <p>Add your photo</p>
            <p>support formats: jpg, jpeg, png</p>
            <p>
              <label for="photo" class="flex items-center space-x-2 block hover:text-gray-300 cursor-pointer"
                     @click="openFileInput">

                <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path
                      d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/>
                </svg>
                <input type="file" @input="form.photo = $event.target.files[0]" id="photo" class="hidden"
                       @change="handleFileInputChange" ref="photo"
                       accept="image/png,image/jpg,image/jpeg">
                <span>click to upload</span>
              </label>
            </p>
          </div>

        </div>

      </section>

      <hr class="">
      <section class="grid  grid-cols-12 gap-4 my-5 ">


        <div class="col-span-full lg:col-span-6">
          <JetLabel for="name" class="sr-only" value="Name"/>
          <JetInput
              id="name"
              v-model="form.name"
              type="text"
              class="mt-1 block w-full"

              autofocus
              placeholder="Full name"
              autocomplete="name"
          />
        </div>
        <div class="col-span-full lg:col-span-6">
          <JetLabel for="username" class="sr-only" value="User Name"/>
          <JetInput
              id="username"
              v-model="form.username"
              type="text"
              class="mt-1 block w-full"
              autofocus
              placeholder="User name"
              autocomplete="username"
          />
        </div>

        <div class="col-span-full lg:col-span-6">
          <JetLabel for="dob" class="sr-only" value="Date of Birth"/>
          <Datepicker id="dob"
                      modelType="yyyy-MM-dd"
                      :format="'MMMM dd, yyyy'"
                      month-name-format="long"
                      class="border-gray-300 mt-1 w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                      auto-apply
                      :enableTimePicker="false"
                      v-model="form.dob"
                      placeholder="DOB" textInput
          />

        </div>

        <!--        Nationality-->
        <div class="col-span-full lg:col-span-6">
          <JetLabel for="nationality" class="sr-only" value="Nationality"/>
          <select
              id="nationality"
              v-model="form.nationality"
              class="border-gray-300 text-gray-500 w-full mt-1 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"

          >
            <option disabled value="">Nationality</option>
            <option value="ghana">Ghana</option>
            <option value="uk">Uk</option>
            <option value="usa">USA</option>
            <option value="nigeria">Nigeria</option>
            <option value="togo">Togo</option>

          </select>
        </div>

        <!--        Email-->
        <div class="col-span-full lg:col-span-6">
          <JetLabel for="email" class="sr-only" value="Email"/>
          <JetInput
              id="email"
              v-model="form.email"
              type="email"
              class="mt-1 block w-full"
              placeholder="Email"


          />
        </div>

<!--        Phone Number-->
        <div class="col-span-full lg:col-span-6">
          <JetLabel for="phone-number" class="sr-only" value="phone number"/>

          <vue-tel-input v-model="form.phoneNumber"></vue-tel-input>
          <JetInput
              id="phone-number"
              v-model="form.phoneNumber"
              type="text"
              class="mt-1 block w-full"

              placeholder="Phone Number"
              autocomplete="phone-number"
          />
        </div>

<!--        Password-->
        <div class="col-span-full lg:col-span-6">
          <JetLabel for="password" class="sr-only" value="Password"/>
          <JetInput
              id="password"
              v-model="form.password"
              type="password"
              class="mt-1 block w-full"

              placeholder="Password"
              autocomplete="new-password"
          />
        </div>

<!--        Password Confirmation-->
        <div class="col-span-full lg:col-span-6">
          <JetLabel for="password_confirmation" class="sr-only" value="Password"/>
          <JetInput
              id="password"
              v-model="form.password_confirmation"
              type="password"
              class="mt-1 block w-full"

              placeholder="Confirm Password"
              autocomplete="password_confirmation"
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

<!--        Bio-->
        <div class="col-span-12">
          <JetLabel for="bio" class="sr-only" value="Bio"/>
          <textarea
              id="bio"
              v-model="form.bio"
              class="mt-1 block w-full rounded border-gray-300"
              placeholder="Bio (optional)"
              rows="5"
          ></textarea>
          <p :class="[  (200 - form.bio?.length) < 0 ? 'text-red-500' : '' ]" class="text-right">{{ 200 - form.bio?.length }}</p>
        </div>

        <div class="col-span-12 flex items-center justify-end mt-4">

          <button class="bg-red-300 w-full rounded-lg p-2 font-bold" :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing">
            Create Account
          </button>
        </div>

        <div class="col-span-full lg:col-span-6 flex items-center  ">
          <span class="text-gray-400">Already have an account? </span>
          <Link :href="route('login')" class="underline  hover:text-gray-900">
            Log in
          </Link>

        </div>

      </section>

    </form>

    <div class="col-span-7  flex p-5">

      <div class=" w-full flex space-x-5  items-center relative">

        <div class="absolute h-full w-10/12 right-0 bg-gray-100 rounded-lg"/>

        <div class="h-[500px] mt-10 relative">
          <img src="/storage/images/back-4.svg" class=" " alt="Lady On Swing">
        </div>

        <div class="flex flex-col space-y-5 -mt-36 relative">
          <img src="/storage/images/back-5.svg" alt="Lady On Swing">
          <img src="/storage/images/back-6.png" alt="Lady On Swing">
        </div>

      </div>

    </div>
  </div>

</template>
