<template>
  <k-block-figure
    :is-empty="!image.url"
    :empty-text="$t('no-image-selected')"
    empty-icon="image"
    @open="open"
    @update="update"
  >
    <div @dblclick="open" :class="classes">
      <img 
        v-if="image.url" 
        :src="image.url"
        class="k-simple-image" 
      >
    </div>
  </k-block-figure>
</template>

<script>
export default {
  computed: {
    image() {
      return this.content.source[0] || {};
    },
    classes() {
      return "k-block-image k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
  }
};
</script>