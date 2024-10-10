<script setup>
import NavLink from "@/Components/NavLink.vue";
import SideNavItems from "./SideNavItems.vue";
import { ref, onMounted, watch } from "vue";

// Toggle Site BIB
// State for controlling the visibility of submenus
const level1OpenBib = ref(false);
const level2OpenBib = ref(false);
const level3OpenBib = ref(false);

// Load initial state from localStorage
onMounted(() => {
    level1OpenBib.value = localStorage.getItem("level1OpenBib") === "true";
    level2OpenBib.value = localStorage.getItem("level2OpenBib") === "true";
    level3OpenBib.value = localStorage.getItem("level3OpenBib") === "true";
});

// Watch changes and save to localStorage
watch([level1OpenBib, level2OpenBib, level3OpenBib], () => {
    localStorage.setItem("level1OpenBib", level1OpenBib.value);
    localStorage.setItem("level2OpenBib", level2OpenBib.value);
    localStorage.setItem("level3OpenBib", level3OpenBib.value);
});

// Toggle functions for each level
const toggleLevel1Bib = () => {
    level1OpenBib.value = !level1OpenBib.value;

    // Jika level1 ditutup, tutup juga level2
    if (!level1OpenBib.value) {
        level2OpenBib.value = false;
        level3OpenBib.value = false;
    }
};

const toggleLevel2Bib = () => {
    console.log(level1OpenBib.value);
    if (!level2OpenBib.value) {
        level1OpenBib.value = true; // pastikan level 1 terbuka jika level 2 dibuka
    }
    level2OpenBib.value = !level2OpenBib.value;
};

const toggleLevel3Bib = () => {
    if (!level3OpenBib.value) {
        level2OpenBib.value = true; // pastikan level 1 terbuka jika level 2 dibuka
    }
    level3OpenBib.value = !level3OpenBib.value;
};

// Toggle Site BA
// State for controlling the visibility of submenus
const level1OpenBA = ref(false);
const level2OpenBA = ref(false);
const level3OpenBA = ref(false);

// Load initial state from localStorage
onMounted(() => {
    level1OpenBA.value = localStorage.getItem("level1OpenBA") === "true";
    level2OpenBA.value = localStorage.getItem("level2OpenBA") === "true";
    level3OpenBA.value = localStorage.getItem("level3OpenBA") === "true";
});

// Watch changes and save to localStorage
watch([level1OpenBA, level2OpenBA, level3OpenBA], () => {
    localStorage.setItem("level1OpenBA", level1OpenBA.value);
    localStorage.setItem("level2OpenBA", level2OpenBA.value);
    localStorage.setItem("level3OpenBA", level3OpenBA.value);
});

// Toggle functions for each level
const toggleLevel1BA = () => {
    level1OpenBA.value = !level1OpenBA.value;

    // Jika level1 ditutup, tutup juga level2
    if (!level1OpenBA.value) {
        level2OpenBA.value = false;
        level3OpenBA.value = false;
    }
};

const toggleLevel2BA = () => {
    console.log(level1OpenBA.value);
    if (!level2OpenBA.value) {
        level1OpenBA.value = true; // pastikan level 1 terbuka jika level 2 dibuka
    }
    level2OpenBA.value = !level2OpenBA.value;
};

const toggleLevel3BA = () => {
    if (!level3OpenBA.value) {
        level2OpenBA.value = true; // pastikan level 1 terbuka jika level 2 dibuka
    }
    level3OpenBA.value = !level3OpenBA.value;
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
                    v-if="$page.props.auth.user.role === 'ict_section'"
                    class="mt-0.5 w-full"
                >
                    <NavLink :href="route('sectionDashboard')">
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
                                class="relative top-0 text-sm leading-normal text-gray-600 ni ni-tv-2"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Dashboard</span
                        >
                    </NavLink>
                </li>

                <li>
                    <div
                        @click="toggleLevel1Bib"
                        style="cursor: pointer"
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-red-700 fas fa-gem"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Site PPA - BIB</span
                        >
                        <i
                            v-if="!level1OpenBib"
                            class="ms-3 fas fa-angle-right"
                        ></i>
                        <i v-else class="ms-3 fas fa-angle-down"></i>
                    </div>
                    <ul v-if="level1OpenBib">
                        <li>
                            <div
                                @click="toggleLevel2Bib"
                                style="cursor: pointer"
                                class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            >
                                <div
                                    class="ml-4 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                >
                                    <i
                                        class="relative top-0 text-sm leading-normal text-red-700 fas fa-dolly-flatbed"
                                    ></i>
                                </div>
                                <span
                                    class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                    >Inventory</span
                                >
                                <i
                                    v-if="!level2OpenBib"
                                    class="ms-3 fas fa-angle-right"
                                ></i>
                                <i v-else class="ms-3 fas fa-angle-down"></i>
                            </div>
                            <ul v-if="level2OpenBib">
                                <NavLink
                                    :href="route('accessPoint.page')"
                                    :active="
                                        route().current('accessPoint.page')
                                    "
                                >
                                    <div
                                        class="ml-8 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
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
                                >
                                    <div
                                        class="ml-8 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
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
                                >
                                    <div
                                        class="ml-8 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
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
                                <div
                                    @click="toggleLevel3Bib"
                                    style="cursor: pointer"
                                    class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                >
                                    <div
                                        class="ml-8 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                    >
                                        <i
                                            class="relative top-0 text-sm leading-normal text-red-700 fas fa-laptop"
                                        ></i>
                                    </div>
                                    <span
                                        class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                        >Laptop</span
                                    >
                                    <i
                                        v-if="!level3OpenBib"
                                        class="ms-3 fas fa-angle-right"
                                    ></i>
                                    <i
                                        v-else
                                        class="ms-3 fas fa-angle-down"
                                    ></i>
                                </div>
                                <li v-if="level3OpenBib">
                                    <NavLink
                                        :href="route('laptop.page')"
                                        :active="route().current('laptop.page')"
                                    >
                                        <div
                                            class="ml-12 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                        >
                                            <i
                                                class="relative top-0 text-sm leading-normal text-red-800 fas fa-laptop-code"
                                            ></i>
                                        </div>
                                        <span
                                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                            >Laptop Fixed</span
                                        >
                                    </NavLink>
                                    <NavLink>
                                        <div
                                            class="ml-12 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                        >
                                            <i
                                                class="relative top-0 text-sm leading-normal text-red-800 fas fa-laptop-medical"
                                            ></i>
                                        </div>
                                        <span
                                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                            >Laptop Re-Utilize</span
                                        >
                                    </NavLink>
                                    <NavLink>
                                        <div
                                            class="ml-12 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                        >
                                            <i
                                                class="relative top-0 text-sm leading-normal text-red-800 fas fa-hand-holding-usd"
                                            ></i>
                                        </div>
                                        <span
                                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                            >Laptop Loan</span
                                        >
                                    </NavLink>
                                    <NavLink>
                                        <div
                                            class="ml-12 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                        >
                                            <i
                                                class="relative top-0 text-sm leading-normal text-red-800 fas fa-tools"
                                            ></i>
                                        </div>
                                        <span
                                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                            >Laptop Warranty</span
                                        >
                                    </NavLink>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <div
                        @click="toggleLevel1BA"
                        style="cursor: pointer"
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    >
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                        >
                            <i
                                class="relative top-0 text-sm leading-normal text-red-700 fas fa-gem"
                            ></i>
                        </div>
                        <span
                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                            >Site PPA - BA</span
                        >
                        <i
                            v-if="!level1OpenBA"
                            class="ms-3 fas fa-angle-right"
                        ></i>
                        <i v-else class="ms-3 fas fa-angle-down"></i>
                    </div>
                    <ul v-if="level1OpenBA">
                        <li>
                            <div
                                @click="toggleLevel2BA"
                                style="cursor: pointer"
                                class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                            >
                                <div
                                    class="ml-4 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                >
                                    <i
                                        class="relative top-0 text-sm leading-normal text-red-700 fas fa-dolly-flatbed"
                                    ></i>
                                </div>
                                <span
                                    class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                    >Inventory</span
                                >
                                <i
                                    v-if="!level2OpenBA"
                                    class="ms-3 fas fa-angle-right"
                                ></i>
                                <i v-else class="ms-3 fas fa-angle-down"></i>
                            </div>
                            <ul v-if="level2OpenBA">
                                <NavLink
                                >
                                    <div
                                        class="ml-8 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
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
                                >
                                    <div
                                        class="ml-8 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
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
                                >
                                    <div
                                        class="ml-8 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
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
                                <div
                                    @click="toggleLevel3BA"
                                    style="cursor: pointer"
                                    class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                                >
                                    <div
                                        class="ml-8 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                    >
                                        <i
                                            class="relative top-0 text-sm leading-normal text-red-700 fas fa-laptop"
                                        ></i>
                                    </div>
                                    <span
                                        class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                        >Laptop</span
                                    >
                                    <i
                                        v-if="!level3OpenBA"
                                        class="ms-3 fas fa-angle-right"
                                    ></i>
                                    <i
                                        v-else
                                        class="ms-3 fas fa-angle-down"
                                    ></i>
                                </div>
                                <li v-if="level3OpenBA">
                                    <NavLink>
                                        <div
                                            class="ml-12 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                        >
                                            <i
                                                class="relative top-0 text-sm leading-normal text-red-800 fas fa-laptop-code"
                                            ></i>
                                        </div>
                                        <span
                                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                            >Laptop Fixed</span
                                        >
                                    </NavLink>
                                    <NavLink>
                                        <div
                                            class="ml-12 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                        >
                                            <i
                                                class="relative top-0 text-sm leading-normal text-red-800 fas fa-laptop-medical"
                                            ></i>
                                        </div>
                                        <span
                                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                            >Laptop Re-Utilize</span
                                        >
                                    </NavLink>
                                    <NavLink>
                                        <div
                                            class="ml-12 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                        >
                                            <i
                                                class="relative top-0 text-sm leading-normal text-red-800 fas fa-hand-holding-usd"
                                            ></i>
                                        </div>
                                        <span
                                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                            >Laptop Loan</span
                                        >
                                    </NavLink>
                                    <NavLink>
                                        <div
                                            class="ml-12 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5"
                                        >
                                            <i
                                                class="relative top-0 text-sm leading-normal text-red-800 fas fa-tools"
                                            ></i>
                                        </div>
                                        <span
                                            class="ml-1 duration-300 opacity-100 pointer-events-none ease"
                                            >Warranty Laptop</span
                                        >
                                    </NavLink>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <!-- end sidenav -->
</template>
