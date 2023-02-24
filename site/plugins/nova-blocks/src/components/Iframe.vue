<template>
  <div :class="classes" @dblclick="open">
    <k-block-figure
      :is-empty="!url"
      :empty-text="$t('add-code')"
      empty-icon="file-code"
      @open="open"
      @update="update"
    >
      <k-text v-if="url">
        {{ content.url }}
      </k-text>
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
        return this.content.url;
      }
      return false;
    }
  }
};
</script>