<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Adminのダッシュボード
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-white">Adminのダッシュボード</h1>
                    {{ __("You're logged in!") }}

                    <div>{{ Auth::user()->name }}</div>

                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href="/guest/index"><button type="button" class="btn head_menu">利用者</button></a>
                        <a href="/post/index"><button type="button" class="btn head_menu">投稿</button></a>
                        <a href="/favorite/index"><button type="button" class="btn head_menu">お気に入り</button></a>
                        <a href="/shop/index"><button type="button" class="btn head_menu">店舗一覧</button></a>
                        <a href="/shopcategory/index"><button type="button" class="btn head_menu">カテゴリー
                        </button></a>
                        <a href="/place/index"><button type="button" class="btn head_menu">市町村</button></a>
                      </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    
</style>