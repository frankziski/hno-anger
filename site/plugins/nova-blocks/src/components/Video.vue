<template>
  <div :class="classes" @dblclick="open">
    <k-block-figure
      :is-empty="!media"
      :empty-text="$t('select-video')"
      empty-icon="video"
      @open="open"
      @update="update"
    >
      <video v-if="media" controls>
        <source :src="media">
      </video>
    </k-block-figure>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    media() {
      if (this.content.media[0]) {
        return this.content.media[0].url;
      }
      return false;
    }
  }
};
</script>