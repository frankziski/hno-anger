<template>
  <div :class="classes">
    <k-headline tag="h6">{{ $t('table') }}</k-headline>
    <div @click="open" v-if="table.length" v-html="createTable(content.table)"></div>

    <figure @click="open" v-else class="k-block-figure"><button class="k-block-figure-empty k-block-figure-source k-button" type="button"><span aria-hidden="true" class="k-button-icon k-icon k-icon-draft"><svg viewBox="0 0 16 16"><use xlink:href="#icon-draft"></use></svg></span><span class="k-button-text">{{ $t('table') }}...</span></button></figure>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    table() {
      return this.content.table || {};
    }
  },
  methods: {
    createTable(myArray) {
        var result = "<table class='k-block-table'>";
        for(var i=0; i<myArray.length; i++) {
            result += "<tr>";
            for(var j=0; j<myArray[i].length; j++){
                result += "<td>"+myArray[i][j]+"</td>";
            }
            result += "</tr>";
        }
        result += "</table>";
    
        return result;
    }
  }
};
</script>