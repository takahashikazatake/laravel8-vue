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
      posts: [
        {
          id: 1,
          user: "User Name",
          tweet:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          createdAt: "2021年02月12日"
        },
        {
          id: 2,
          user: "User Name2",
          tweet:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          createdAt: "2021年02月16日"
        }
      ],
      name: this.userName.name,
      newTweet: "",
      nextId: 3
    };
  },
  methods: {
    addNewPost: function() {
      console.log("hello");
      this.posts.push({
        id: this.nextId++,
        user: this.name,
        tweet: this.newTweet,
        createdAt: "2021/02/12"
      });
      this.newTweet = "";
    },
    hello: function() {
      console.log("hello");
    }
  }
};
</script>

<style>
</style>