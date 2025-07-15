<!-- resources/js/Pages/Auth/Register.vue -->
<template>
    <AuthLayout>
        <FormHeader title="Sign up" subtitle="Create your account" />

        <form @submit.prevent="submit" class="space-y-6">
            <FormInput
                id="name"
                label="Name"
                type="text"
                placeholder="Enter your full name"
                v-model="form.name"
                :error="form.errors.name"
                required
            />

            <FormInput
                id="email"
                label="E-mail"
                type="email"
                placeholder="example@gmail.com"
                v-model="form.email"
                :error="form.errors.email"
                required
            />

            <PasswordInput
                id="password"
                label="Password"
                placeholder="Enter your password"
                v-model="form.password"
                :error="form.errors.password"
                required
            />

            <PasswordInput
                id="password_confirmation"
                label="Confirm Password"
                placeholder="Confirm your password"
                v-model="form.password_confirmation"
                :error="form.errors.password_confirmation"
                required
            />

            <SubmitButton :processing="form.processing">
                Sign up
            </SubmitButton>
        </form>

        <AuthFooter to="/" text="Already have an account?" link-text="Sign in" />
    </AuthLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

import AuthLayout from '@/Components/Layouts/AuthLayout.vue';
import FormHeader from '@/Components/UI/FormHeader.vue';
import FormInput from '@/Components/Forms/FormInput.vue';
import PasswordInput from '@/Components/Forms/PasswordInput.vue';
import SubmitButton from '@/Components/Forms/SubmitButton.vue';
import AuthFooter from '@/Components/UI/AuthFooter.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<style scoped>
</style>
