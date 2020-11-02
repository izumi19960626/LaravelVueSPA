<template>
  <div>
    <main>
      <div class="container">
        <article class="col-md-12 col-xs-12">
          <section class="home-quiz_introduction">
            <h2 class="home-quiz_introduction-h2">
              Laraクイズについて
            </h2>
            <p>Laraクイズはビジネスマナーから一般常識に至るまで様々な4択クイズを出題します。</p>
            <p>何度もトライしてみて正解率100%を目指してみてください。</p>
          </section>
          <section class="home-quiz_setting">
            <h2 class="home-quiz_setting-h2">
              出題設定
            </h2>
            <form>
              <p>
              <label v-for="(cate,index) in category" :key="index">
                <input type="checkbox" v-model="categories" :value="cate.id" checked/>{{cate.name}}
              </label>
              </p>
              <button type="submit" class="btn btn-primary" @click.stop.prevent="goQuiz()">出題開始</button>
              <input type="hidden" name="_token" value />
            </form>
          </section>
          <section class="home_notice">
            <h2 class="home_notice-h2">
              お知らせ情報
            </h2>
            <dl v-for="(info, index) in information" :key="index">
              <dt>{{info.created_at}}</dt>
              <dd>{{info.information}}</dd>
            </dl>
          </section>
        </article>
       <the-sidebar></the-sidebar>
      </div>
      <notifications />
    </main>
  </div>
</template>

<script>
 import TheSidebar from "../layout/TheSidebar";
 import BarChart from "../module/BarChart";;

 export default{
  components: {
   TheSidebar,
   BarChart,
  },

  data(){
   return{
    categories: [1],
    information :[],
    category: [],
   };
  },
  mounted() {
    this.$http.get("/api/category").then(response => {
      this.category = response.data;
    });
    this.$http.get("/api/information").then(response => {
      this.information = response.data;
    });
    const referrer = document.referrer;
    if (referrer.indexOf("/login") !== -1) {
      this.displayNotification("ログインしました", "info");
      this.resetReferrer();
    } else if (referrer.indexOf("/register") !== -1) {
      this.displayNotification("会員登録しました", "success");
      this.resetReferrer();
    }
  },
  methods: {
   checkAll() {
     let val = [];
     this.category.forEach(element => {
       val.push(element.id);
     });
     this.categories = val;
   },
   checkAllOff() {
     this.categories = [];
   },
   goQuiz(){
    this.$router.push("/quiz?categories="+this.categories);
   },
   resetReferrer() {
      Object.defineProperty(document, "referrer", {
        value: location.href
      });
    },
    displayNotification(text, type) {
      this.$notify({
        title: "お知らせ",
        text: text,
        type: type
      });
    }
  }
 };
</script>
