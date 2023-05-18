<li>
    <div class="flex items-center px-4 py-4">
        <div class="flex-none">
            <img class="h-10 w-10 rounded-md object-cover"
                src="{{ gravatar($user->email) }}" alt="Gravatar" />
        </div>
        <div class="ltr:pl-4 rtl:pr-4">
            <h4 class="text-base">
                {{ $user->name }}<span class="rounded bg-success-light px-1 text-xs text-success ltr:ml-2 rtl:ml-2">Pro</span>
            </h4>
            <a class="text-black/60 hover:text-primary dark:text-dark-light/60 dark:hover:text-white"
                href="javascript:;">{{ $user->email }}</a>
        </div>
    </div>
</li>
