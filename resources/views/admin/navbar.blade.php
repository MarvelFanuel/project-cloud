    <!-- Main navigation container -->
    <nav class="fixed z-[100] flex w-full flex-nowrap items-center justify-between bg-zinc-100 xl:px-44 lg:px-24 md:px-12 px-4 py-2 text-black shadow-dark-mild hover:text-neutral-700 focus:text-neutral-700 lg:flex-wrap lg:justify-start lg:py-4"
        data-twe-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between">
            <div class="ms-2">
                <a class="text-xl text-black font-extrabold" href="{{ route('admin.index') }}">Admin Page</a>
            </div>
            <!-- Hamburger button for mobile view -->
            <button
                class="block border-0 bg-transparent px-2 text-black hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 lg:hidden"
                type="button" data-twe-collapse-init data-twe-target="#navbarSupportedContent2"
                aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <!-- Hamburger icon -->
                <span class="[&>svg]:w-7 [&>svg]:stroke-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>

            <!-- Collapsible navbar container -->
            <div class="!visible mt-2 hidden basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
                id="navbarSupportedContent2" data-twe-collapse-item>
                <!-- Left links -->
                <ul class="list-style-none me-auto flex flex-col ps-0 lg:mt-1 lg:flex-row" data-twe-navbar-nav-ref>
                    <li class="my-2 ps-2 flex items-center lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                        <a class="text-black lg:px-2" aria-current="page" href="{{ route('admin.index') }}"
                            data-twe-nav-link-ref>Applicants</a>
                    </li>
                    <li class="my-2 ps-2 flex items-center lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                        <a class="text-black lg:px-2" aria-current="page" href="{{ route('admin.project') }}"
                            data-twe-nav-link-ref>Projects</a>
                    </li>
                    <li class="my-2 ps-2 flex items-center lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
                        <a class="text-black lg:px-2" aria-current="page" href="{{ route('logout') }}"
                            data-twe-nav-link-ref>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
