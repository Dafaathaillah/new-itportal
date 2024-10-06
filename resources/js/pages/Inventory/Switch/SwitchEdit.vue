<script setup>
import AuthenticatedLayoutForm from "@/Layouts/AuthenticatedLayoutForm.vue";
import { Link } from "@inertiajs/vue3";
import { Head, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import { ref } from "vue";

const props = defineProps(["switch"]);

const form = useForm({
    id: props.switch.id,
    device_name: props.switch.device_name,
    inventory_number: props.switch.inventory_number,
    asset_ho_number: props.switch.asset_ho_number,
    serial_number: props.switch.serial_number,
    frequency: props.switch.frequency,
    mac_address: props.switch.mac_address,
    ip_address: props.switch.ip_address,
    device_brand: props.switch.device_brand,
    device_type: props.switch.device_type,
    device_model: props.switch.device_model,
    location: props.switch.location,
    status: props.switch.status,
    note: props.switch.note,
});

const isDisabled = ref(true);

const update = () => {
    form.put(route("switch.update", props.switch.id), {
        onSuccess: () => {
            // Show SweetAlert2 success notification
            Swal.fire({
                title: "Success!",
                text: "Data has been successfully updated!",
                icon: "success",
                confirmButtonText: "OK",
                confirmButtonColor: "#3085d6",
            });
        },
        onError: () => {
            Swal.fire({
                title: "error!",
                text: "Data not updated!",
                icon: "waring",
                confirmButtonText: "OK",
                confirmButtonColor: "#3085d6",
            });
        },
    });
};

const save = () => {
    form.post(route("switch.store"), {
        onSuccess: () => {
            // Show SweetAlert2 success notification
            Swal.fire({
                title: "Success!",
                text: "Data has been successfully created!",
                icon: "success",
                confirmButtonText: "OK",
                confirmButtonColor: "#3085d6",
            });
        },
        onError: () => {
            Swal.fire({
                title: "error!",
                text: "Data not created!",
                icon: "waring",
                confirmButtonText: "OK",
                confirmButtonColor: "#3085d6",
            });
        },
    });
};
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
                        <a class="text-white opacity-50">Pages</a>
                    </li>
                    <Link
                        :href="route('switch.page')"
                        class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                        aria-current="page"
                    >
                        Switch
                    </Link>
                </ol>
                <h6 class="mb-0 font-bold text-white capitalize">
                    Switch Edit Pages
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
                                    Form Edit Switch
                                </p>
                            </div>
                        </div>
                        <div class="flex-auto p-6">
                            <form @submit.prevent="update">
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
                                                name="device_name"
                                                v-model="form.device_name"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="Device Name"
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
                                                :disabled="isDisabled"
                                                type="text"
                                                name="inventory_number"
                                                v-model="form.inventory_number"
                                                value="1"
                                                class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Auto Generate Inventory Number"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                    >
                                        <div class="mb-4">
                                            <label
                                                for="asset-ho-number"
                                                class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                                >Asset Ho Number</label
                                            >
                                            <input
                                                type="text"
                                                v-model="form.asset_ho_number"
                                                name="asset_ho_number"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="00:04:xx:xx:xx:xx"
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
                                                v-model="form.serial_number"
                                                name="serial_number"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="00:04:xx:xx:xx:xx"
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
                                                v-model="form.ip_address"
                                                name="ip_address"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="10.1.x.xx"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                    >
                                        <div class="mb-4">
                                            <label
                                                for="mac_address"
                                                class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                                >Mac Address</label
                                            >
                                            <input
                                                type="text"
                                                v-model="form.mac_address"
                                                name="mac_address"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="10.1.x.xx"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0"
                                    >
                                        <div class="mb-4">
                                            <label
                                                for="device-brand"
                                                class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                                >Device Brand</label
                                            >
                                            <input
                                                type="text"
                                                v-model="form.device_brand"
                                                name="device_brand"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="Ubixxxxx"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0"
                                    >
                                        <div class="mb-4">
                                            <label
                                                for="device-type"
                                                class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                                >Device Type</label
                                            >
                                            <input
                                                type="text"
                                                v-model="form.device_type"
                                                name="device_type"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="UAP-xx-MESH"
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
                                                v-model="form.device_model"
                                                name="device_model"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="2.4 / 5.8 Ghz"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
                                    >
                                        <div class="mb-4">
                                            <label
                                                for="device-location"
                                                class="inline-block mb-2 ml-1 text-sm text-slate-700 dark:text-white/80"
                                                >Device Location</label
                                            >
                                            <input
                                                type="text"
                                                v-model="form.location"
                                                name="location"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                placeholder="Markas ICT"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
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
                                                v-model="form.status"
                                                name="status"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            >
                                                <option
                                                    selected
                                                    value="Ready_Used"
                                                >
                                                    Ready Used
                                                </option>
                                                <option value="Ready_Stanby">
                                                    Ready Standby
                                                </option>
                                                <option value="Scrap">
                                                    Scrap
                                                </option>
                                                <option value="Breakdown">
                                                    Breakdown
                                                </option>
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
                                                name="note"
                                                v-model="form.note"
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
                                            Save Changes
                                        </span>
                                    </button>
                                    <Link
                                        :href="route('switch.page')"
                                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400"
                                    >
                                        <span
                                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"
                                        >
                                            Cancel
                                        </span>
                                    </Link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayoutForm>
</template>
