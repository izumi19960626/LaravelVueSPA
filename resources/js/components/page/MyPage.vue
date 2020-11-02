<template>
  <div>
    <main>
      <div class="container">
        <article class="col-md-8 col-xs-12">
          <section class="article-section">
            <h2 class="mypage-h2">
              <img class="mypage_logo" src="/img/mypage-icon.png" />マイページ
            </h2>
            <h3>あなたのクイズ回答数: {{changeCorrectRatioData.length}}回</h3>
            <h3>あなたのクイズ正解率: {{changeCorrectRatioData.percentage_correct_answer}}</h3>
          </section>
        </article>
        <the-sidebar></the-sidebar>
      </div>
    </main>
  </div>
</template>

<script>
import TheSidebar from "../layout/TheSidebar";
export default {
  components: {
    TheSidebar
  },
  data() {
    return {
      changeCorrectRatioData: []
    };
  },
  mounted() {
    this.$http.get("/api/mypage").then(response => {
      this.changeCorrectRatioData = response.data;
      console.log(this.changeCorrectRatioData);
    });
  }
};
</script>
