<template>
  <div :class="classes" @dblclick="open">
    <k-headline tag="h6">{{ $t('carousel' )}}</k-headline>

    <k-block-figure
      :is-empty="!items"
      :empty-text="$t('no-image-selected')"
      empty-icon="image"
      @open="open"
      @update="update"
    >
      <k-collection layout="cards" v-if="media" :sortable=true :items="items" />
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
      if (this.content.images[0]) {
        return this.content.images[0].url;
      }
      return false;
    },
    items() {
      if (this.content.images[0]) {
        return this.content.images.map(entry => ({
          image: { src: entry.url, cover: true, ratio: '16/9' },
          text: entry.text
        }));
      }
    }
  }
};
</script>