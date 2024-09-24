<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const yearxyz = new Date().getFullYear();

</script>

<template>
   <div class="container sticky top-0 z-sticky">
      <div class="flex flex-wrap -mx-3">
         <div class="w-full max-w-full px-3 flex-0">
            <!-- Navbar -->
            <nav
               class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 m-6 mb-0 shadow-sm rounded-xl bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
               <div class="flex items-center justify-between w-full p-0 px-6 mx-auto flex-wrap-inherit">
                  <img src="/images/logoppa.png" alt="message placeholder image" width="50">
                  <button navbar-trigger
                     class="px-3 py-1 ml-2 leading-none transition-all ease-in-out bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg lg:hidden"
                     type="button" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
                        <span bar1
                           class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                        <span bar2
                           class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                        <span bar3
                           class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                     </span>
                  </button>
                  <div navbar-menu
                     class="items-center flex-grow transition-all duration-500 lg-max:overflow-hidden ease lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                     <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                        <li>
                           <span class="py-1.75 mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0 text-2xl">ICT PPA CENTER</span>
                        </li>
                       
                     </ul>

                     <ul class="hidden pl-0 mb-0 list-none lg:block lg:flex-row">
                        <li>
                              <img src="/images/sinergyppa.png" alt="message placeholder image" width="80">
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
      </div>
   </div>
   <main class="mt-0 transition-all duration-200 ease-in-out">
      <section>
         <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
            <div class="container z-1">
               <div class="flex flex-wrap -mx-3">

                  <!-- left -->
                     <slot />
                  <!-- end left -->
                  <!-- right section -->

                  <div
                     class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                     <div
                        class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('https://i.ibb.co.com/styGkVK/file.jpg')] rounded-xl ">
                        <span
                           class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                        <h4 class="z-20 mt-12 font-bold text-white">Team Work</h4>
                        <p class="z-20 text-white ">“Teamwork is the ability to work together toward a common vision. The ability to direct individual accomplishments toward organizational objectives. It is the fuel that allows common people to attain uncommon results.”</p>
                     </div>
                  </div>

                  <!-- end right section -->
               </div>
            </div>
         </div>
      </section>
   </main>
   <footer class="py-12">
      <div class="container">
         <div class="flex flex-wrap -mx-3">
         </div>
         <div class="flex flex-wrap -mx-3">
            <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
               <p class="mb-0 text-slate-400">
                  Copyright ©
                  {{ yearxyz }}
                   by ICT PPA BIB.
               </p>
            </div>
         </div>
      </div>
   </footer>
</template>