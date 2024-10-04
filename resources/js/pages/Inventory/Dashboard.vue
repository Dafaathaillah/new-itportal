<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
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
                        Dashboard
                    </li>
                </ol>
                <h6
                    v-if="$page.props.auth.user.role === 'ict_developer'"
                    class="mb-0 font-bold text-white capitalize"
                >
                    Developer Dashboard
                </h6>
                <h6
                    v-if="$page.props.auth.user.role === 'ict_group_leader'"
                    class="mb-0 font-bold text-white capitalize"
                >
                    Group Leader Dashboard
                </h6>
                <h6
                    v-if="$page.props.auth.user.role === 'ict_section'"
                    class="mb-0 font-bold text-white capitalize"
                >
                    Section Dashboard
                </h6>
                <h6
                    v-if="$page.props.auth.user.role === 'ict_technician'"
                    class="mb-0 font-bold text-white capitalize"
                >
                    Ttechnician Dashboard
                </h6>
                <h6
                    v-if="$page.props.auth.user.role === 'ict_admin'"
                    class="mb-0 font-bold text-white capitalize"
                >
                    Admin Dashboard
                </h6>
            </nav>
        </template>

        <!-- cards -->
        <div class="w-full px-6 py-6 mx-auto">
            <!-- row 1 -->
            <div class="flex flex-wrap -mx-3">
                <!-- card1 -->
                <div
                    class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4"
                >
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"
                    >
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60"
                                        >
                                            Today's Money
                                        </p>
                                        <h5
                                            class="mb-2 font-bold dark:text-white"
                                        >
                                            $53,000
                                        </h5>
                                        <p
                                            class="mb-0 dark:text-white dark:opacity-60"
                                        >
                                            <span
                                                class="text-sm font-bold leading-normal text-emerald-500"
                                                >+55%</span
                                            >
                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500"
                                    >
                                        <i
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card2 -->
                <div
                    class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4"
                >
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"
                    >
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60"
                                        >
                                            Today's Users
                                        </p>
                                        <h5
                                            class="mb-2 font-bold dark:text-white"
                                        >
                                            2,300
                                        </h5>
                                        <p
                                            class="mb-0 dark:text-white dark:opacity-60"
                                        >
                                            <span
                                                class="text-sm font-bold leading-normal text-emerald-500"
                                                >+3%</span
                                            >
                                            since last week
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600"
                                    >
                                        <i
                                            class="ni leading-none ni-world text-lg relative top-3.5 text-white"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card3 -->
                <div
                    class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4"
                >
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"
                    >
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60"
                                        >
                                            New Clients
                                        </p>
                                        <h5
                                            class="mb-2 font-bold dark:text-white"
                                        >
                                            +3,462
                                        </h5>
                                        <p
                                            class="mb-0 dark:text-white dark:opacity-60"
                                        >
                                            <span
                                                class="text-sm font-bold leading-normal text-red-600"
                                                >-2%</span
                                            >
                                            since last quarter
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400"
                                    >
                                        <i
                                            class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card4 -->
                <div
                    class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4"
                >
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border"
                    >
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60"
                                        >
                                            Sales
                                        </p>
                                        <h5
                                            class="mb-2 font-bold dark:text-white"
                                        >
                                            $103,430
                                        </h5>
                                        <p
                                            class="mb-0 dark:text-white dark:opacity-60"
                                        >
                                            <span
                                                class="text-sm font-bold leading-normal text-emerald-500"
                                                >+5%</span
                                            >
                                            than last month
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500"
                                    >
                                        <i
                                            class="ni leading-none ni-cart text-lg relative top-3.5 text-white"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cards row 3 -->

            <div class="flex flex-wrap mt-6 -mx-3">
                <div
                    class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-6/12 lg:flex-none"
                >
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border"
                    >
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h6 class="mb-2 dark:text-white">
                                    Table Monitoring Device PPA - BIB
                                </h6>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table
                                class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40"
                            >
                                <tbody>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Access Point
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Switch
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Wirelless
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Printer
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mt-0 lg:w-6/12 lg:flex-none">
                    <div
                        class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border"
                    >
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h6 class="mb-2 dark:text-white">
                                    Table Monitoring Device PPA - MIFA
                                </h6>
                            </div>
                        </div>
                         <div class="overflow-x-auto">
                            <table
                                class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40"
                            >
                                <tbody>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Access Point
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Switch
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Wirelless
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Printer
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap mt-6 -mx-3">
                <div
                    class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-6/12 lg:flex-none"
                >
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border"
                    >
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h6 class="mb-2 dark:text-white">
                                    Table Monitoring Device PPA - AMY
                                </h6>
                            </div>
                        </div>
                         <div class="overflow-x-auto">
                            <table
                                class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40"
                            >
                                <tbody>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Access Point
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Switch
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Wirelless
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Printer
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mt-0 lg:w-6/12 lg:flex-none">
                    <div
                        class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border"
                    >
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h6 class="mb-2 dark:text-white">
                                    Table Monitoring Device PPA - ABP
                                </h6>
                            </div>
                        </div>
                         <div class="overflow-x-auto">
                            <table
                                class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40"
                            >
                                <tbody>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Access Point
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Switch
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Wirelless
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div
                                                class="flex items-center px-2 py-1"
                                            >
                                                <div>
                                                    <img
                                                        src="/assets/img/logoppa.png"
                                                        alt="Country flag"
                                                        class="inline transition-all duration-200 dark:hidden ease-nav-brand max-h-8 mr-2"
                                                    />
                                                </div>
                                                <div class="ml-6">
                                                    <h6
                                                        class="mb-0 text-sm leading-normal dark:text-white"
                                                    >
                                                        Printer
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Used:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    100
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Ready Stanby:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    30
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Scrap:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    10
                                                </h6>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"
                                                >
                                                    Breakdown:
                                                </p>
                                                <h6
                                                    class="mb-0 text-sm leading-normal dark:text-white"
                                                >
                                                    15
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cards -->
    </AuthenticatedLayout>
</template>
