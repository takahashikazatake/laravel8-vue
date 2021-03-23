<template>
  <div class="container">
    <form v-on:submit.prevent="addNewPost" class="d-flex mb-4 mt-1">
      <div class="form-group flex-grow-1">
        <input type="text" class="form-control" v-model="newTweet" />
      </div>
      <button type="submit" class="btn btn-primary btn-sm mb-4">投稿</button>
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
      userId: this.userName.id,
      postId: 1
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
      let post = {
        id: this.postId++,
        user: this.name,
        tweet: this.newTweet,
        createdAt: this.currentTime,
        userId: this.userId
      };
      let posts = this.posts;

      if (this.newTweet == "") {
        alert("入力してください");
        return;
      }

      axios
        .post("/article", post)
        .then(function(res) {
          // TODO: article apiの受信データ処理を行う
        })
        .catch(function(err) {
          // TODO: エラー発生時の処理を行う
        });
      this.posts.unshift(post);
      this.newTweet = "";
    },
    getPosts: function() {
      let post = this.posts;
      let setPostId = this.setPostId;
      axios
        .get("/api/article/fetchAllArticles")
        .then(function(res) {
          res.data.forEach(function(article) {
            post.unshift({
              id: article.id,
              user: article.user_name,
              tweet: article.body,
              createdAt: article.created_at,
              userId: article.user_id
            });
          });
        })
        .then(function(res) {
          setPostId(post[0].id);
        });
    },
    deletePost: function(id) {
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
    },
    setPostId: function(id) {
      this.postId += id;
    }
  }
};
</script>

<style>
</style>
