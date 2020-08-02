<router-link tag="h3" :to="{
                        name: 'index',
                        params: {
                            resourceName: 'nova-mail-manager'
                        }
                    }" class="cursor-pointer flex items-center font-normal dim text-white mb-6 text-base no-underline">
    <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22"><path fill="var(--sidebar-icon)" d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2zm16 3.38V6H4v1.38l8 4 8-4zm0 2.24l-7.55 3.77a1 1 0 0 1-.9 0L4 9.62V18h16V9.62z"/></svg>
    <span class="sidebar-label">
        {{ __('Mail Manager') }}
    </span>
</router-link>
