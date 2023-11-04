<style>
  @import '../../layouts/modern-dark-menu/css/dark/loader.css';
  @import '../../layouts/modern-dark-menu/css/dark/plugins.css';
  @import '../../src/bootstrap/css/bootstrap.min.css';
  @import '../../src/assets/css/dark/dashboard/dash_1.css';
</style>



<script setup>
import '../../layouts/modern-dark-menu/loader.js';
import '../../src/bootstrap/js/bootstrap.bundle.min.js';
import 'perfect-scrollbar'
import '../../src/plugins/src/mousetrap/mousetrap.min.js';
import '../../layouts/modern-dark-menu/app.js';

import '../../src/assets/js/dashboard/dash_1.js';
import NavBar from "@/Components/NavBar.vue";
import SideBar from "@/Components/SideBar.vue";
import Footer from "@/Components/Footer.vue";

</script>

<template>


    <!--  BEGIN NAVBAR  -->
   <NavBar />
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <SideBar />
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <div class="row layout-top-spacing">
                        <slot />
                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            <Footer />
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->
</template>
