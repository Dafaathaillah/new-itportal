<script>
import NavLink from "@/Components/NavLink.vue";
import SideNavItems from "./SideNavItems.vue";

// import SidenavItem from "./SidenavItem.vue";

export default {
    name: "SidenavList",
    props: {
        cardBg: String,
    },
    data() {
        return {
            title: "Argon Dashboard 2",
            controls: "dashboardsExamples",
            isActive: "active",
            dropDownStatus: '',
        };
    },
    components: {
        SideNavItems,
        NavLink
    },
    mounted() { this.$refs.okBtn.click() },
    methods: {
        useDropDown(status) {
            this.dropDownStatus = status;
            console.log('oe = ' +this.dropDownStatus);
        },
    },
};
</script>

<template>
    <!-- sidenav  -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
                href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
                <img src="/assets/img/logo-ct-dark.png"
                    class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                    alt="main_logo" />
                <img src="/assets/img/logo-ct.png"
                    class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                    alt="main_logo" />
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Argon Dashboard 2</span>
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div>
            <button ref="okBtn" @click.prevent="useDropDown(route().current('accessPoint.page'))"></button>
        </div>

        <div class="items-center block w-auto max-h-screen grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li v-if="$page.props.auth.user.role === 'ict_developer'" class="mt-0.5 w-full">
                    <NavLink :href="route('developerDashboard')" :active="route().current('developerDashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </NavLink>
                </li>
                <li v-if="$page.props.auth.user.role === 'ict_group_leader'" class="mt-0.5 w-full">
                    <NavLink :href="route('groupLeaderDashboard')" :active="route().current('groupLeaderDashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </NavLink>
                </li>
                <li v-if="$page.props.auth.user.role === 'ict_section'" class="mt-0.5 w-full">
                    <NavLink :href="route('sectionDashboard')" :active="route().current('sectionDashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </NavLink>
                </li>
                <li v-if="$page.props.auth.user.role === 'ict_technician'" class="mt-0.5 w-full">
                    <NavLink :href="route('technicianDashboard')" :active="route().current('technicianDashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </NavLink>
                </li>
                <li v-if="$page.props.auth.user.role === 'ict_admin'" class="mt-0.5 w-full">
                    <NavLink :href="route('adminDashboard')" :active="route().current('adminDashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </NavLink>
                </li>

                <!-- <li class="mt-0.5 w-full">
                    <NavLink :href="route('accessPoint.page')" :active="route().current('accessPoint.page')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Access Point</span>
                    </NavLink>
                </li> -->

                <li>
                    <div class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" @click.prevent="useDropDown(true)">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Access Point</span>
                        <i v-if="!dropDownStatus" class="ms-3 fas fa-angle-right"></i>
                        <i v-else class="ms-3 fas fa-angle-down"></i>
                    </div>
                    <ul v-if="dropDownStatus">
                        <NavLink :href="route('accessPoint.page')" :active="route().current('accessPoint.page')">
                            <div
                                class="ml-4 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i
                                    class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Access Point</span>
                        </NavLink>
                        <NavLink :href="route('accessPoint.page')" :active="route().current('accessPoint.page')">
                            <div
                                class="ml-4 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i
                                    class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Access Point</span>
                        </NavLink>
                    </ul>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./pages/billing.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-emerald-500 fas fa-wifi"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Billing</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./pages/virtual-reality.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Virtual Reality</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./pages/rtl.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">RTL</span>
                    </a>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">
                        Account pages
                    </h6>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./pages/profile.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./pages/sign-in.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign In</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="./pages/sign-up.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-collection"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign Up</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- end sidenav -->
</template>
