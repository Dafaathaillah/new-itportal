<script setup>
import AuthenticatedLayoutForm from "@/Layouts/AuthenticatedLayoutForm.vue";
import { Head } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayoutForm>
        <template #header>
            <nav>
                <!-- breadcrumb -->
                <ol
                    class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16"
                >
                    <li class="text-sm leading-normal">
                        <a class="text-white opacity-50" href="javascript:;"
                            >Pages</a
                        >
                    </li>
                    <li
                        class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                        aria-current="page"
                    >
                        Access Point Create Pages
                    </li>
                </ol>
                <h6 class="mb-0 font-bold text-white capitalize">
                    Access Point Data
                </h6>
            </nav>
        </template>

        <div class="w-full p-6 mx-auto">
            <div class="flex flex-wrap -mx-3 justify-center">
                <div
                    class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0"
                >
                    <div
                        class="relative flex flex-col min-w-0 break-words justify-self: center bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"
                    >
                        <div
                            class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0"
                        >
                            <div class="flex items-center">
                                <p class="mb-0 font-bold dark:text-white/80">
                                    Form Create Access Point
                                </p>
                            </div>
                        </div>
                        <form class="flex-auto p-6">
                            <hr
                                class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent"
                            />
                            <div class="flex flex-wrap -mx-3">
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="device-name"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Device Name</label
                                        >
                                        <input
                                            type="text"
                                            name="device-name"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="inventory-number"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Inventory Number</label
                                        >
                                        <input
                                            type="text"
                                            name="inventory-number"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="serial-number"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Serial Number</label
                                        >
                                        <input
                                            type="text"
                                            name="serial-number"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="ip-address"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Ip Address</label
                                        >
                                        <input
                                            type="text"
                                            name="ip-address"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="device-brand"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Device Brand</label
                                        >
                                        <input
                                            type="text"
                                            name="device-brand"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="device-type"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Device Type</label
                                        >
                                        <input
                                            type="text"
                                            name="device-type"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="device-model"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Device Model</label
                                        >
                                        <input
                                            type="text"
                                            name="device-model"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="device-location"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Device Location</label
                                        >
                                        <input
                                            type="text"
                                            name="device-location"
                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="status"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                        >
                                            Status</label
                                        >
                                        <select
                                            id="status"
                                            name="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        >
                                            <option>Ready Used</option>
                                            <option>Ready Standby</option>
                                            <option>Scrap</option>
                                            <option>Breakdown</option>
                                        </select>
                                    </div>
                                </div>
                                <div
                                    class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0"
                                >
                                    <div class="mb-4">
                                        <label
                                            for="device-location"
                                            class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                            >Note</label
                                        >
                                        <textarea
                                            id="message"
                                            name="message"
                                            rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Leave a note..."
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr
                                class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent"
                            />
                            <div class="flex flex-nowrap mt-6 justify-end">
                                <button
                                    type="submit"
                                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800"
                                >
                                    <span
                                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
                                    >
                                        Save
                                    </span>
                                </button>
                                <NavLink
                                    :href="route('accessPoint.page')"
                                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400"
                                >
                                    <span
                                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
                                    >
                                        Cancel
                                    </span>
                                </NavLink>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayoutForm>
</template>
