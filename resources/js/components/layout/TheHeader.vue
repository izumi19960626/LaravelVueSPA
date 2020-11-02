<template>
    <header>
      <div class="container text-center">
        <router-link to="/"><h1>Laraクイズ -徹底解説-</h1></router-link>

      </div>
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button
              type="button"
              class="navbar-toggle"
              data-toggle="collapse"
              data-target="#navbar-ex-collapse"
             >
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
            </button>
           <router-link class="navbar-brand" id="header-nav_home" to="/">ホーム</router-link>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right" v-if="auth.length === 0">
              <li>
                <router-link id="header-nav_login" to="/login">ログイン</router-link>
              </li>
              <li>
                <router-link id="header-nav_register" to="/register">ユーザー登録</router-link>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" v-if="auth.length !== 0">
            <li class="dropdown">
              <a
                href="#"
                class="dropdown-toggle navbar-brand"
                id="header-nav_name"
                data-toggle="dropdown"
                role="button"
                aria-expanded="false"
              >
                {{auth.name}}
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu header-nav_drop-down" role="menu">
                <li>
                  <router-link class="navbar-brand" id="header-nav_mypage" to="/mypage">マイページ</router-link>
                  <a class="navbar-brand" id="header-nav_logout" @click="logout">ログアウト</a>
                  <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" :value="csrf" />
                 </form>
               </li>
             </ul>
            </li>
           </ul>
          </div>
        </div>
      </nav>
    </header>
  </template>

  <script>
  export default {
    data() {
      return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      };
    },
    props: {
     auth: {
      type: Object | Array
     }
    },
    methods: {
     logout(){
      document.querySelector('#logout-form').submit();
     }
    }
  };
  </script>
