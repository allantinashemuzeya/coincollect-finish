<style>
 @import '../../layouts/modern-dark-menu/css/dark/loader.css';
 @import '../../src/bootstrap/css/bootstrap.min.css';
 @import '../../src/assets/css/light/authentication/auth-cover.css';
 @import '../../layouts/modern-dark-menu/css/dark/plugins.css';
 @import '../../src/assets/css/dark/authentication/auth-cover.css';

</style>

<script setup>
import '../../layouts/modern-dark-menu/loader.js';
import '../../src/bootstrap/js/bootstrap.bundle.min.js';
</script>

<template>
    <div class="auth-container d-flex">
        <div class="container mx-auto align-self-center">
            <div class="row">
                <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>

                    <div class="auth-cover">

                        <div class="position-relative">


                            <h2 class="mt-5 text-white font-weight-bolder px-2">Join the community </h2>
                            <p class="text-white px-2">It is easy to setup with great customer experience. Start your 7-day free trial</p>
                        </div>

                    </div>

                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <slot />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

