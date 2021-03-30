<template>
  <!-- <div class="card mb-2">
    <div class="card-header d-flex flex-row-reverse">
      <span @click="del" v-show="post.userId === this.authId">&times;</span>
    </div>
    <div class="card-body">
      <div class="d-flex">
        <a :href="url" class="text-dark">
          <i class="fas fa-user-circle fa-3x mr-3"></i>
        </a>
        <a :href="url" class="text-dark mt-1">
          <div class="font-weight-bold">{{ post.user }}</div>
        </a>
      </div>
      <div class="card-title mt-4">{{ post.tweet }}</div>
      <div class="card-text mt-3">投稿日時 {{ post.createdAt }}</div>
    </div>
  </div>-->
  <v-card class="mx-auto mb-3" max-width="600">
    <v-card-title>
      <v-icon large left>mdi-account-circle</v-icon>
      <span class="title font-weight-light">{{ post.user }}</span>
    </v-card-title>
    <v-card-text class="headline font-weight-bold">{{ post.tweet }}</v-card-text>
    <v-card-text class="headline">投稿日時 {{ post.createdAt }}</v-card-text>
    <v-card-actions class="d-flex flex-row-reverse pr-4">
      <v-icon right @click="del" v-show="post.userId === this.authId">mdi-delete</v-icon>
      <v-btn @click="like" icon color="pink">
        <v-icon>mdi-heart</v-icon>
        <span>2</span>
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: ["post", "authId"],
  data: function() {
    return {
      url: `users/${this.post.user}`
    };
  },
  methods: {
    del: function() {
      this.$emit("del");
    },
    like: function() {
      alert("Like it!");
    }
  }
};
</script>
<style>
</style>
