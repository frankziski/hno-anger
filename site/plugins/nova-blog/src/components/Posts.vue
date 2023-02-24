<template>
  <div :class="classes" @dblclick="open">
    <figure 
      v-if="empty" 
      @dblclick="open" 
      class="k-block-figure">
        <button class="k-block-figure-empty k-button" type="button">
          <span aria-hidden="true" class="k-button-icon k-icon k-icon-page">
            <svg viewBox="0 0 16 16"><use xlink:href="#icon-page"></use></svg>
          </span>
          <span class="k-button-text"> {{ $t('select-page') }}</span>
        </button>
    </figure>

    <figure 
      v-else 
      @dblclick="open" 
      class="k-block-figure is-selected">
      <button class="k-block-figure-empty k-block-figure-source k-button" type="button">
        <span aria-hidden="true" class="k-button-icon k-icon k-icon-page">
          <svg viewBox="0 0 16 16"><use xlink:href="#icon-page"></use></svg>
        </span>
        <span class="k-button-text">{{ $t('posts-from')}} {{ content.source[0].id }}</span>
        <span class="k-button-description">{{ options }}</span>
      </button>
    </figure>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    options() {
      return "Sortierung: " + this.content.sort + ' Anzahl: ' +  this.content.numberofposts + ' Anzeigeart: ' + this.content.showas;
    },
    empty() {
      if (!this.content.source[0]) {
        return true;
      }
      return false;
    }
  }
};
</script>