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
      nextId: 1
    };
  },
  methods: {
    addNewPost: function() {
      this.posts.push({
        id: this.nextId++,
        user: this.name,
        tweet: this.newTweet,
        createdAt: "2021/02/12"
      });
      this.newTweet = "";
    }
  }
};
</script>

<style>
</style>