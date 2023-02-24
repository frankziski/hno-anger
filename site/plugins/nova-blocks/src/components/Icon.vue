<template>
  <div :class="classes" @dblclick="open">
    <k-block-figure
      :is-empty="!svgcode"
      :empty-text="$t('add-code')"
      empty-icon="file-code"
      @open="open"
      @update="update"
    >
      <div v-html="svgcode" class="icon"></div>
    </k-block-figure>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    svgcode() {
      if (this.content.svgcode) {
        return this.content.svgcode;
      }
      return false;
    }
  }
};
</script>