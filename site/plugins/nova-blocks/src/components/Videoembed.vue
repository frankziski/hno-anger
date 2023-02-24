<template>
  <div :class="classes" @dblclick="open">
    <k-block-figure
      :is-empty="!url"
      :empty-text="$t('select-video')"
      empty-icon="youtube"
      @open="open"
      @update="update"
    >
      <iframe v-if="url" :src="url" />
    </k-block-figure>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    url() {
      if (this.content.url) {
        var url = this.content.url;
        var youtubePattern = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        var youtubeMatch = url.match(youtubePattern);
        if (youtubeMatch) {
          return "https://www.youtube.com/embed/" + youtubeMatch[2];
        }
      }
      return false;
    }
  }
};
</script>