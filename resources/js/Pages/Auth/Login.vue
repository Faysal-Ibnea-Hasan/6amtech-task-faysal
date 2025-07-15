<template>
    <AuthLayout>
        <FormHeader title="Sign in" subtitle="Login to your designated account from here" />

        <form @submit.prevent="submit" class="space-y-6">
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

            <RememberMeForgot
                v-model="form.remember"
                forgot-password-link="#" />

            <SubmitButton :processing="form.processing">
                Sign in
            </SubmitButton>

            <div v-if="form.errors.general" class="text-sm text-red-600 text-center">
                {{ form.errors.general }}
            </div>
        </form>

        <AuthFooter to="/register" text="Don't have an account?" link-text="Sign up" />
    </AuthLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';


import AuthLayout from '@/Components/Layouts/AuthLayout.vue';
import FormHeader from '@/Components/UI/FormHeader.vue';
import FormInput from '@/Components/Forms/FormInput.vue';
import PasswordInput from '@/Components/Forms/PasswordInput.vue';
import RememberMeForgot from '@/Components/Forms/RememberMeForgot.vue';
import SubmitButton from '@/Components/Forms/SubmitButton.vue';
import AuthFooter from '@/Components/UI/AuthFooter.vue';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    });
};
</script>

<style scoped>
</style>
