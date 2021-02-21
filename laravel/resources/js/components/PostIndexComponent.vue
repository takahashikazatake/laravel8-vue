<template>
  <div class="container">
    <form v-on:submit.prevent="addNewPost">
      <div class="form-group">
        <input type="text" class="form-control" v-model="newTweet" />
      </div>
      <button type="submit" class="btn btn-primary btn-sm mb-3">投稿</button>
    </form>
    <div class="card mb-2" v-for="post in posts" :key="post.id">
      <div class="card-body">
        <button @click="deletePost(post.id)">削除</button>
        <div class="font-weight-bold">{{ post.user }}</div>
        <div class="card-title mt-4">{{ post.tweet }}</div>
        <div class="card-text mt-3">投稿日時 {{ post.createdAt }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["userName", "currentPost"],
  created() {
    this.getPosts();
  },
  data: function() {
    return {
      posts: [],
      name: this.userName.name,
      newTweet: "",
      date: "",
      fetchedPost: this.currentPost
    };
  },
  computed: {
    currentTime: function() {
      this.date = new Date();
      return this.date.toLocaleDateString();
    },
    currentId: function() {
      return this.posts[0].id;
    },
    nextId: function() {
      return this.currentId + 1;
    }
  },
  methods: {
    addNewPost: function() {
      let post = {
        id: this.nextId,
        user: this.name,
        tweet: this.newTweet,
        createdAt: this.currentTime
      };
      if (this.newTweet == "") {
        alert("入力してください");
        return;
      }
      this.posts.unshift(post);

      axios
        .post("/article", post)
        .then(function(res) {
          console.log(res.data);
        })
        .catch(function(err) {
          console.log(err);
        });
      this.newTweet = "";
    },
    getPosts: function() {
      let obj = this.fetchedPost;
      let post = this.posts;
      let name = this.name;

      Object.keys(obj).forEach(function(key) {
        post.unshift({
          id: obj[key].id,
          user: name,
          tweet: obj[key].body,
          createdAt: obj[key].created_at
        });
      });
      console.log("Hello");
    },
    deletePost: function(id) {
      //配列から選択されたオブジェクトを削除
      let posts = this.posts;
      const selectedPost = posts.find(function(item) {
        return item.id == id;
      });

      posts.some(function(val, index) {
        if (val == selectedPost) {
          posts.splice(index, 1);
        }
      });

      axios
        .delete("/article/" + id)
        .then(function(res) {
          console.log(res.data);
        })
        .catch(function(err) {
          console.log(err);
        });
    }
  }
};
</script>

<style>
</style>