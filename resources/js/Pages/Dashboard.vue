<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import {computed} from "vue";


const page = usePage()
const user = computed(() => page.props.auth.user)
const user_coins = computed(() => page.props.user_coins)
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">My Wallet</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                    <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">
                        <div class="w-info">
                            <p class="value">R 10,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                        </div>

                    </div>

                    <div class="w-progress-stats">
                        <div class="progress">
                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="">
                            <div class="w-icon">
                                <p>57%</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-five">
                <div class="widget-content">
                    <div class="account-box">

                        <div class="info-box">
                            <div class="icon">
                                                <span>
                                                    <img src="../../src/assets/img/money-bag.png" alt="money-bag">
                                                </span>
                            </div>

                            <div class="balance-info">
                                <h6>Total Balance</h6>
                                <p>R41,741.42</p>
                            </div>
                        </div>

                        <div class="card-bottom-section">
                            <div><span class="badge badge-light-success">+ 13.6% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></span></div>
                            <a href="javascript:void(0);" class="">View Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-three">
                <div class="widget-content">
                    <div class="account-box">
                        <div class="info">
                            <div class="inv-title">
                                <h5 class="">Total Balance</h5>
                            </div>
                            <div class="inv-balance-info">
                                <p class="inv-balance">$ 41,741.42</p>
                                <span class="inv-stats balance-credited">+ 2453</span>
                            </div>
                        </div>
                        <div class="acc-action">
                            <div class="">
                                <a href="javascript:void(0);" class="btn-wallet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                            </div>
                            <a href="javascript:void(0);" class="btn-add-balance">Add Balance</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget-four">
                <div class="widget-heading">
                    <h5 class="">My Coins</h5>
                </div>
                <div class="widget-content">
                    <div class="vistorsBrowser">
                        <div class="browser-list">
                            <div class="w-icon">
                                <svg height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#FFDC64;" cx="256" cy="256" r="158.897"></circle> <circle style="fill:#FFC850;" cx="256" cy="256" r="132.414"></circle> <circle style="fill:#FFF082;" cx="256" cy="256" r="114.759"></circle> <g> <path style="fill:#D5DCED;" d="M487.362,146.276c-2.087-4.401-7.353-6.28-11.758-4.185c-4.405,2.091-6.284,7.358-4.19,11.763 c15.215,32.034,22.931,66.4,22.931,102.146c0,131.423-106.922,238.345-238.345,238.345c-68.546,0-132.167-28.702-177.378-79.245 l24.516,8.172c4.655,1.556,9.63-0.961,11.164-5.582c1.543-4.625-0.957-9.625-5.578-11.168l-52.966-17.655 c-2.897-0.966-6.094-0.366-8.448,1.599c-2.354,1.956-3.518,4.995-3.086,8.025l8.828,61.793c0.629,4.401,4.405,7.577,8.733,7.577 c0.414,0,0.836-0.03,1.259-0.09c4.828-0.69,8.181-5.16,7.491-9.987l-4.299-30.08C114.741,481.478,182.749,512,256,512 c141.155,0,256-114.84,256-256C512,217.617,503.706,180.698,487.362,146.276z"></path> <path style="fill:#D5DCED;" d="M17.655,256C17.655,124.577,124.577,17.655,256,17.655c68.382,0,132.223,28.726,177.462,79.273 l-24.599-8.2c-4.672-1.556-9.621,0.957-11.164,5.582s0.957,9.625,5.578,11.168l52.966,17.655c0.914,0.306,1.854,0.452,2.793,0.452 c2.035,0,4.043-0.707,5.655-2.051c2.354-1.956,3.518-4.995,3.086-8.025l-8.828-61.793c-0.69-4.823-5.155-8.185-9.992-7.487 c-4.828,0.69-8.181,5.16-7.491,9.987l4.291,30.023C397.219,30.524,329.031,0,256,0C114.845,0,0,114.84,0,256 c0,38.383,8.294,75.302,24.638,109.725c1.508,3.181,4.681,5.038,7.982,5.038c1.267,0,2.552-0.271,3.776-0.853 c4.405-2.091,6.284-7.358,4.19-11.763C25.37,326.112,17.655,291.746,17.655,256z"></path> </g> <path style="fill:#E1A546;" d="M264.828,249.417v-45.682c15.593,2.281,26.483,10.227,26.483,17.506c0,4.875,3.948,8.828,8.828,8.828 c4.879,0,8.828-3.953,8.828-8.828c0-18.061-18.795-32.57-44.138-35.345v-9.345c0-4.875-3.948-8.828-8.828-8.828 c-4.879,0-8.828,3.953-8.828,8.828v9.345c-25.343,2.775-44.138,17.283-44.138,35.345c0,25.638,24.566,35.372,44.138,41.342v45.682 c-15.593-2.281-26.483-10.227-26.483-17.506c0-4.875-3.948-8.828-8.828-8.828c-4.879,0-8.828,3.953-8.828,8.828 c0,18.061,18.795,32.57,44.138,35.345v9.345c0,4.875,3.948,8.828,8.828,8.828c4.879,0,8.828-3.953,8.828-8.828v-9.345 c25.343-2.775,44.138-17.283,44.138-35.345C308.966,265.121,284.399,255.386,264.828,249.417z M220.69,221.241 c0-7.279,10.89-15.225,26.483-17.506v40.209C227.484,237.193,220.69,231.093,220.69,221.241z M264.828,308.265v-40.209 c19.689,6.751,26.483,12.851,26.483,22.702C291.31,298.038,280.42,305.984,264.828,308.265z"></path> </g></svg>                            </div>
                            <div class="w-browser-details">
                                <div class="w-browser-info">
                                    <h6>Bronze</h6>
                                    <p class="browser-count">65%</p>
                                </div>
                                <div class="w-browser-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="browser-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                            </div>
                            <div class="w-browser-details">

                                <div class="w-browser-info">
                                    <h6>Silver</h6>
                                    <p class="browser-count">25%</p>
                                </div>

                                <div class="w-browser-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="browser-list">
                            <div class="w-icon">
                                <svg height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#FFDC64;" cx="256" cy="256" r="158.897"></circle> <circle style="fill:#FFC850;" cx="256" cy="256" r="132.414"></circle> <circle style="fill:#FFF082;" cx="256" cy="256" r="114.759"></circle> <g> <path style="fill:#D5DCED;" d="M487.362,146.276c-2.087-4.401-7.353-6.28-11.758-4.185c-4.405,2.091-6.284,7.358-4.19,11.763 c15.215,32.034,22.931,66.4,22.931,102.146c0,131.423-106.922,238.345-238.345,238.345c-68.546,0-132.167-28.702-177.378-79.245 l24.516,8.172c4.655,1.556,9.63-0.961,11.164-5.582c1.543-4.625-0.957-9.625-5.578-11.168l-52.966-17.655 c-2.897-0.966-6.094-0.366-8.448,1.599c-2.354,1.956-3.518,4.995-3.086,8.025l8.828,61.793c0.629,4.401,4.405,7.577,8.733,7.577 c0.414,0,0.836-0.03,1.259-0.09c4.828-0.69,8.181-5.16,7.491-9.987l-4.299-30.08C114.741,481.478,182.749,512,256,512 c141.155,0,256-114.84,256-256C512,217.617,503.706,180.698,487.362,146.276z"></path> <path style="fill:#D5DCED;" d="M17.655,256C17.655,124.577,124.577,17.655,256,17.655c68.382,0,132.223,28.726,177.462,79.273 l-24.599-8.2c-4.672-1.556-9.621,0.957-11.164,5.582s0.957,9.625,5.578,11.168l52.966,17.655c0.914,0.306,1.854,0.452,2.793,0.452 c2.035,0,4.043-0.707,5.655-2.051c2.354-1.956,3.518-4.995,3.086-8.025l-8.828-61.793c-0.69-4.823-5.155-8.185-9.992-7.487 c-4.828,0.69-8.181,5.16-7.491,9.987l4.291,30.023C397.219,30.524,329.031,0,256,0C114.845,0,0,114.84,0,256 c0,38.383,8.294,75.302,24.638,109.725c1.508,3.181,4.681,5.038,7.982,5.038c1.267,0,2.552-0.271,3.776-0.853 c4.405-2.091,6.284-7.358,4.19-11.763C25.37,326.112,17.655,291.746,17.655,256z"></path> </g> <path style="fill:#E1A546;" d="M264.828,249.417v-45.682c15.593,2.281,26.483,10.227,26.483,17.506c0,4.875,3.948,8.828,8.828,8.828 c4.879,0,8.828-3.953,8.828-8.828c0-18.061-18.795-32.57-44.138-35.345v-9.345c0-4.875-3.948-8.828-8.828-8.828 c-4.879,0-8.828,3.953-8.828,8.828v9.345c-25.343,2.775-44.138,17.283-44.138,35.345c0,25.638,24.566,35.372,44.138,41.342v45.682 c-15.593-2.281-26.483-10.227-26.483-17.506c0-4.875-3.948-8.828-8.828-8.828c-4.879,0-8.828,3.953-8.828,8.828 c0,18.061,18.795,32.57,44.138,35.345v9.345c0,4.875,3.948,8.828,8.828,8.828c4.879,0,8.828-3.953,8.828-8.828v-9.345 c25.343-2.775,44.138-17.283,44.138-35.345C308.966,265.121,284.399,255.386,264.828,249.417z M220.69,221.241 c0-7.279,10.89-15.225,26.483-17.506v40.209C227.484,237.193,220.69,231.093,220.69,221.241z M264.828,308.265v-40.209 c19.689,6.751,26.483,12.851,26.483,22.702C291.31,298.038,280.42,305.984,264.828,308.265z"></path> </g></svg>
                            </div>
                            <div class="w-browser-details">

                                <div class="w-browser-info">
                                    <h6>Platinum</h6>
                                    <p class="browser-count">15%</p>
                                </div>

                                <div class="w-browser-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row widget-statistic">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-followers">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                </div>
                                <div class="">
                                    <p class="w-value">31.6K</p>
                                    <h5 class="">Followers</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-referral">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                </div>
                                <div class="">
                                    <p class="w-value">1,900</p>
                                    <h5 class="">Referral</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <div class="widget widget-one_hybrid widget-engagement">
                        <div class="widget-heading">
                            <div class="w-title">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                </div>
                                <div class="">
                                    <p class="w-value">18.2%</p>
                                    <h5 class="">Engagement</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
