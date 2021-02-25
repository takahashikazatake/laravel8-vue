<template>
  <div class="container">
    <form v-on:submit.prevent="addNewPost">
      <div class="form-group">
        <input type="text" class="form-control" v-model="newTweet" />
      </div>
      <button type="submit" class="btn btn-primary btn-sm mb-3">投稿</button>
    </form>
    <post-card
      v-for="post in posts"
      :key="post.id"
      :post="post"
      @del="deletePost(post.id)"
      :auth-id="userId"
    ></post-card>
  </div>
</template>

<script>
import PostCard from "./PostCard";
export default {
  props: ["userName"],
  components: {
    PostCard
  },
  created() {
    this.getPosts();
  },
  data: function() {
    return {
      posts: [],
      name: this.userName.name,
      newTweet: "",
      date: "",
      userId: this.userName.id
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
        createdAt: this.currentTime,
        userId: this.userId
      };
      if (this.newTweet == "") {
        alert("入力してください");
        return;
      }
      this.posts.unshift(post);

      axios
        .post("/article", post)
        .then(function(res) {
          // TODO: article apiの受信データ処理を行う
        })
        .catch(function(err) {
          // TODO: エラー発生時の処理を行う
        });
      this.newTweet = "";
    },
    getPosts: function() {
      let post = this.posts;
      axios.get("/api/article/fetchAllData").then(function(res) {
        res.data.forEach(function(el) {
          post.unshift({
            id: el.id,
            user: el.user_name,
            tweet: el.body,
            createdAt: el.created_at,
            userId: el.user_id
          });
        });
      });
    },
    deletePost: function(id) {
      //配列から選択されたオブジェクトを削除
      let posts = this.posts;
      const selectedPost = posts.find(function(item) {
        return item.id === id;
      });

      posts.some(function(val, index) {
        if (val === selectedPost) {
          posts.splice(index, 1);
        }
      });

      axios
        .delete("/article/" + id)
        .then(function(res) {
          // TODO: article apiの受信データ処理を行う
        })
        .catch(function(err) {
          // TODO: エラー発生時の処理を行う
        });
    }
  }
};
</script>

<style>
</style>
