<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
<div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
    <a href="/dashboard" class="flex items-center pl-2.5 mb-5">
        <img src="/assets/logo.png" class="h-6 mr-3 sm:h-7" alt="Web Asrama" />
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Web Asrama</span>
    </a>
    <ul class="space-y-2 font-medium">
        <li>
            <a href="/dashboard" class="flex items-center p-2 rounded-lg group {{ Request::is('dashboard') ? 'bg-blue-500 dark:text-white text-white dark:bg-gray-700 dark:hover:text-white' : 'text-gray-900 hover:bg-blue-500 hover:text-white dark:hover:bg-gray-700' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                </svg>
            <span class="ml-3">Beranda</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/mahasiswa" class="flex items-center p-2 text-gray-900 rounded-lg {{ Request::is('dashboard/mahasiswa') || Request::is('dashboard/mahasiswa/*') ? 'dark:text-white group bg-blue-500 text-white dark:bg-gray-700 dark:hover:text-white' : 'hover:bg-blue-500 hover:text-white dark:hover:bg-gray-700' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M19.5 21a3 3 0 003-3v-4.5a3 3 0 00-3-3h-15a3 3 0 00-3 3V18a3 3 0 003 3h15zM1.5 10.146V6a3 3 0 013-3h5.379a2.25 2.25 0 011.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 013 3v1.146A4.483 4.483 0 0019.5 9h-15a4.483 4.483 0 00-3 1.146z" />
                </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Data Mahasiswa</span>
            <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"></span>
            </a>
        </li>
        <li>
            <a href="/dashboard/surat" class="flex items-center p-2 text-gray-900 rounded-lg {{ Request::is('dashboard/surat') || Request::is('dashboard/surat/*') ? 'dark:text-white group bg-blue-500 text-white dark:bg-gray-700 dark:hover:text-white' : 'hover:bg-blue-500 hover:text-white dark:hover:bg-gray-700' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Pengajuan Surat</span>
            <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $count_surat }}</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/pengumuman" class="flex items-center p-2 text-gray-900 rounded-lg {{ Request::is('dashboard/pengumuman') || Request::is('dashboard/pengumuman/*') ? 'dark:text-white group bg-blue-500 text-white dark:bg-gray-700 dark:hover:text-white' : 'hover:bg-blue-500 hover:text-white dark:hover:bg-gray-700' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M16.881 4.346A23.112 23.112 0 018.25 6H7.5a5.25 5.25 0 00-.88 10.427 21.593 21.593 0 001.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.592.772-2.468a17.116 17.116 0 01-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0018 11.25c0-2.413-.393-4.735-1.119-6.904zM18.26 3.74a23.22 23.22 0 011.24 7.51 23.22 23.22 0 01-1.24 7.51c-.055.161-.111.322-.17.482a.75.75 0 101.409.516 24.555 24.555 0 001.415-6.43 2.992 2.992 0 00.836-2.078c0-.806-.319-1.54-.836-2.078a24.65 24.65 0 00-1.415-6.43.75.75 0 10-1.409.516c.059.16.116.321.17.483z" />
                </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Pengumuman</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/dokumentasi" class="flex items-center p-2 text-gray-900 rounded-lg {{ Request::is('dashboard/dokumentasi') || Request::is('dashboard/dokumentasi/*') ? 'dark:text-white group bg-blue-500 text-white dark:bg-gray-700 dark:hover:text-white' : 'hover:bg-blue-500 hover:text-white dark:hover:bg-gray-700' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Dokumentasi</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/aduan" class="flex items-center p-2 text-gray-900 rounded-lg {{ Request::is('dashboard/aduan') || Request::is('dashboard/aduan/*') ? 'dark:text-white group bg-blue-500 text-white dark:bg-gray-700 dark:hover:text-white' : 'hover:bg-blue-500 hover:text-white dark:hover:bg-gray-700' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Aduan</span>
                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $count_aduan }}</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/peraturan" class="flex items-center p-2 text-gray-900 rounded-lg {{ Request::is('dashboard/peraturan') || Request::is('dashboard/peraturan/*') ? 'dark:text-white group bg-blue-500 text-white dark:bg-gray-700 dark:hover:text-white' : 'hover:bg-blue-500 hover:text-white dark:hover:bg-gray-700' }}">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Peraturan</span>
            </a>
        </li>
    </ul>
</div>
</aside>
