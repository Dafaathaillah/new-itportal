<script setup>
import NavLink from "@/Components/NavLink.vue";
import SideNavItems from "./SideNavItems.vue";
import { ref } from "vue";

// State for controlling the visibility of submenus
const level1Open = ref(false);
const level2Open = ref(false);
const level3Open = ref(false);

// Toggle functions for each level
const toggleLevel1 = () => {
    level1Open.value = !level1Open.value;
};

const toggleLevel2 = () => {
    level2Open.value = !level2Open.value;
    if (level2Open.value) {
       level1Open.value =  ref(true); // Open Level 1 when Level 2 is opened
    }
};

const toggleLevel3 = () => {
    level3Open.value = !level3Open.value;
};
</script>

<template>
    <!-- sidenav  -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false"
    >
        <div class="h-19">
            <i
                class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close
            ></i>
            <div
                class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
            >
                <img
                    src="/assets/img/logoppa.png"
                    class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                    alt="main_logo"
                />
                <span
                    class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"
                    >ICT - PPA INVENTORY</span
                >
            </div>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent"
        />


        <div class="items-center block w-auto max-h-screen grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li
                    v-if="$page.props.auth.user.role === 'ict_developer'"
                    class="mt-0.5 w-full"
                >
                    <NavLink
                        :href="route('developerDashboard')"
                        :active="route().current('developerDashboard')"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-gray-600  ni ni-tv-2"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Dashboard</span
                        >
                    </NavLink>
                </li>
                <li
                    v-if="$page.props.auth.user.role === 'ict_group_leader'"
                    class="mt-0.5 w-full"
                >
                    <NavLink
                        :href="route('groupLeaderDashboard')"
                        :active="route().current('groupLeaderDashboard')"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-gray-600  ni ni-tv-2"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Dashboard</span
                        >
                    </NavLink>
                </li>
                <li
                    v-if="$page.props.auth.user.role === 'ict_section'"
                    class="mt-0.5 w-full"
                >
                    <NavLink :href="route('sectionDashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-gray-600  ni ni-tv-2"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Dashboard</span
                        >
                    </NavLink>
                </li>
                <li
                    v-if="$page.props.auth.user.role === 'ict_technician'"
                    class="mt-0.5 w-full"
                >
                    <NavLink :href="route('technicianDashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-gray-600 ni ni-tv-2"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Dashboard</span
                        >
                    </NavLink>
                </li>
                <li
                    v-if="$page.props.auth.user.role === 'ict_admin'"
                    class="mt-0.5 w-full"
                >
                    <NavLink :href="route('adminDashboard')">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-gray-600  ni ni-tv-2"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Dashboard</span
                        >
                    </NavLink>
                </li>

                <li  @click="toggleLevel1">
                    <div
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-red-700 fas fa-warehouse"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Site PPA - BIB</span
                        >
                        <i
                            v-if="!level1Open"
                            class="ms-3 fas fa-angle-right"
                        ></i>
                        <i v-else class="ms-3 fas fa-angle-down"></i>
                    </div>
                    <ul v-if="level1Open">
                        <NavLink
                            :href="route('accessPoint.page')"
                            :active="route().current('accessPoint.page')"
                            @click="toggleLevel2"
                        >
                            <div
                                class="ml-4 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                            >
                                <i
                                    class="relative top-0 text-sm leading-normal text-red-800 fas fa-ethernet"
                                ></i>
                            </div>
                            <span
                                class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                >Access Point</span
                            >
                        </NavLink>
                        <NavLink
                            :href="route('switch.page')"
                            :active="route().current('switch.page')"
                            @click="toggleLevel2"
                        >
                            <div
                                class="ml-4 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                            >
                                <i
                                    class="relative top-0 text-sm leading-normal text-red-800 fas fa-project-diagram"
                                ></i>
                            </div>
                            <span
                                class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                >Switch</span
                            >
                        </NavLink>
                         <NavLink
                            :href="route('wirelless.page')"
                            :active="route().current('wirelless.page')"
                            @click="toggleLevel2"
                        >
                            <div
                                class="ml-4 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                            >
                                <i
                                    class="relative top-0 text-sm leading-normal text-red-800 fas fa-wifi"
                                ></i>
                            </div>
                            <span
                                class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                >Wirelless</span
                            >
                        </NavLink>
                         <NavLink
                            :href="route('laptop.page')"
                            :active="route().current('laptop.page')"
                            @click="toggleLevel2"
                        >
                            <div
                                class="ml-4 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                            >
                                <i
                                    class="relative top-0 text-sm leading-normal text-red-800 fas fa-laptop"
                                ></i>
                            </div>
                            <span
                                class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                >Laptop Fixed</span
                            >
                        </NavLink>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <!-- end sidenav -->
</template>
