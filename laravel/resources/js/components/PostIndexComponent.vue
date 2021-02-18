<template>
  <div class="container">
    <form v-on:submit.prevent="addNewPost">
      <div class="form-group">
        <input type="text" class="form-control" v-model="newTweet" />
      </div>
      <button type="submit" class="btn btn-primary btn-sm mb-3">投稿</button>
    </form>
    <post-component v-for="post in posts" :key="post.id" :post="post"></post-component>
  </div>
</template>

<script>
import PostComponent from "./PostComponent";
export default {
  components: {
    PostComponent
  },
  props: ["userName"],
  data: function() {
    return {
      posts: [],
      name: this.userName.name,
      newTweet: "",
      nextId: 1,
      date: ""
    };
  },
  computed: {
    currentTime: function() {
      this.date = new Date();
      return this.date.toLocaleDateString();
    }
  },
  methods: {
    addNewPost: function() {
      if (this.newTweet == "") {
        alert("入力してください");
        return;
      }
      this.posts.push({
        id: this.nextId++,
        user: this.name,
        tweet: this.newTweet,
        createdAt: this.currentTime
      });
      this.newTweet = "";
    }
  }
};
</script>

<style>
</style>