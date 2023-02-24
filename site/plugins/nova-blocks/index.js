var bn=Object.defineProperty;var D=Object.getOwnPropertySymbols;var gn=Object.prototype.hasOwnProperty,$n=Object.prototype.propertyIsEnumerable;var O=(a,r,s)=>r in a?bn(a,r,{enumerable:!0,configurable:!0,writable:!0,value:s}):a[r]=s,_=(a,r)=>{for(var s in r||(r={}))gn.call(r,s)&&O(a,s,r[s]);if(D)for(var s of D(r))$n.call(r,s)&&O(a,s,r[s]);return a};(function(){"use strict";var a=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("h2",{staticClass:"k-block-type-heading"},[e("k-writer",{ref:"input",attrs:{inline:!0,marks:!0,placeholder:t.headingField.placeholder||"Headline\u2026",value:t.content.heading},on:{input:function(i){return t.update({heading:i})}}})],1),t.content.items.length?e("div",t._l(t.items,function(i,o){return e("details",{key:o,staticClass:"k-block-type-accordion-item"},[e("summary",[e("k-writer",{ref:"summary",refInFor:!0,attrs:{inline:!0,marks:!1,value:i.content.summary},on:{input:function(l){return t.updateItem(t.content,o,"summary",l)}}})],1),e("div",[e("k-writer",{ref:"details",refInFor:!0,attrs:{marks:!0,value:i.content.details},on:{input:function(l){return t.updateItem(t.content,o,"details",l)}}})],1)])}),0):e("div",[t._v("Items\u2026")])])},r=[];function s(t,n,e,i,o,l,B,vn){var c=typeof t=="function"?t.options:t;n&&(c.render=n,c.staticRenderFns=e,c._compiled=!0),i&&(c.functional=!0),l&&(c._scopeId="data-v-"+l);var d;if(B?(d=function(u){u=u||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext,!u&&typeof __VUE_SSR_CONTEXT__!="undefined"&&(u=__VUE_SSR_CONTEXT__),o&&o.call(this,u),u&&u._registeredComponents&&u._registeredComponents.add(B)},c._ssrRegister=d):o&&(d=vn?function(){o.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:o),d)if(c.functional){c._injectStyles=d;var mn=c.render;c.render=function(fn,V){return d.call(V),mn(fn,V)}}else{var P=c.beforeCreate;c.beforeCreate=P?[].concat(P,d):[d]}return{exports:t,options:c}}const z={computed:{items(){return this.content.items||{}},headingField(){return this.field("heading")||""},classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width}},methods:{updateItem(t,n,e,i){t.items[n].content[e]=i,this.$emit("update",_(_({},this.content),t))}}},h={};var G=s(z,a,r,!1,L,null,null,null);function L(t){for(let n in h)this[n]=h[n]}var N=function(){return G.exports}(),U=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"k-custom-block",on:{dblclick:t.open}},[e("details",[e("summary",[e("k-writer",{ref:"summary",attrs:{inline:!0,marks:"false",placeholder:t.summaryField.placeholder||"Headline\u2026",value:t.content.summary},on:{input:function(i){return t.update({summary:i})}}})],1),e("k-writer",{ref:"details",attrs:{inline:t.detailsField.inline||!1,marks:t.detailsField.marks,value:t.content.details,placeholder:t.detailsField.placeholder||"Details\u2026"},on:{input:function(i){return t.update({details:i})}}})],1)])},X=[];const Q={computed:{summaryField(){return this.field("summary")},detailsField(){return this.field("details")}}},k={};var W=s(Q,U,X,!1,A,null,null,null);function A(t){for(let n in k)this[n]=k[n]}var J=function(){return W.exports}(),K=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[this.content.iconimage[0]?e("img",{class:t.classesImg,attrs:{src:this.content.iconimage[0].url}}):t._e(),e("h4",[e("k-writer",{ref:"input",attrs:{inline:!0,marks:!0,placeholder:t.headingField.placeholder||"Headline\u2026",value:t.content.heading},on:{input:function(i){return t.update({heading:i})}}})],1),this.content.text?e("k-writer",{class:t.classesText,attrs:{inline:!0,value:t.content.text},on:{input:function(i){return t.update({text:i})}}}):t._e()],1)},Y=[];const Z={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},classesImg(){return"k-content-align-"+this.content.aligncontent+" k-block-type-blurb-img"},classesText(){return"k-content-align-"+this.content.aligncontent+" k-block-type-blurb-text"},headingField(){return this.field("heading")||""}}},p={};var tt=s(Z,K,Y,!1,et,null,null,null);function et(t){for(let n in p)this[n]=p[n]}var nt=function(){return tt.exports}(),it=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[t.content.linkfield.length?e("div",t._l(t.content.linkfield,function(i,o){return e("k-button",{key:o,class:t.classesButton(i)},[t._v(" "+t._s(i.linktitle)+" ")])}),1):e("div",[e("k-button",{class:t.classesButton},[t._v(" Button... ")])],1)])},st=[];const ot={computed:{classes(){return"k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width}},methods:{classesButton(t){return"k-button-custom k-block-button-style-"+t.style}}},v={};var ct=s(ot,it,st,!1,rt,null,null,null);function rt(t){for(let n in v)this[n]=v[n]}var lt=function(){return ct.exports}(),at=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-headline",{attrs:{tag:"h6"}},[t._v(t._s(t.$t("carousel")))]),e("k-block-figure",{attrs:{"is-empty":!t.items,"empty-text":t.$t("no-image-selected"),"empty-icon":"image"},on:{open:t.open,update:t.update}},[t.media?e("k-collection",{attrs:{layout:"cards",sortable:!0,items:t.items}}):t._e()],1)],1)},ut=[];const dt={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},media(){return this.content.images[0]?this.content.images[0].url:!1},items(){if(this.content.images[0])return this.content.images.map(t=>({image:{src:t.url,cover:!0,ratio:"16/9"},text:t.text}))}}},m={};var _t=s(dt,at,ut,!1,ht,null,null,null);function ht(t){for(let n in m)this[n]=m[n]}var kt=function(){return _t.exports}(),pt=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"k-custom-block",on:{dblclick:t.open}},[[e("figure",{staticClass:"k-block-figure"},[e("button",{staticClass:"k-block-figure-empty k-block-figure-source k-button",attrs:{type:"button"}},[e("span",{staticClass:"k-button-icon k-icon k-icon-email",attrs:{"aria-hidden":"true"}},[e("svg",{attrs:{viewBox:"0 0 16 16"}},[e("use",{attrs:{"xlink:href":"#icon-email"}})])]),e("span",{staticClass:"k-button-text"},[t._v(t._s(t.$t("form")))])])])]],2)},vt=[];const mt={},f={};var ft=s(mt,pt,vt,!1,bt,null,null,null);function bt(t){for(let n in f)this[n]=f[n]}var gt=function(){return ft.exports}(),$t=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-headline",{attrs:{tag:"h6"}},[t._v("Galerie")]),e("k-block-figure",{attrs:{"is-empty":!t.items,"empty-text":t.$t("no-image-selected"),"empty-icon":"image"},on:{open:t.open,update:t.update}},[t.media?e("k-collection",{attrs:{layout:"cards",sortable:!0,items:t.items}}):t._e()],1)],1)},xt=[];const yt={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},media(){return this.content.media[0]?this.content.media[0].url:!1},items(){if(this.content.media[0])return this.content.media.map(t=>({image:{src:t.url,cover:!0,ratio:"16/9"},text:t.text}))}}},b={};var wt=s(yt,$t,xt,!1,Ft,null,null,null);function Ft(t){for(let n in b)this[n]=b[n]}var Ct=function(){return wt.exports}(),Rt=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[this.content.heromediatype=="heroimage"?[this.content.heromedia[0]?e("img",{class:t.classesImg,attrs:{src:this.content.heromedia[0].url}}):t._e()]:t._e(),this.content.heromediatype=="herovideo"?[t.video?e("video",{attrs:{controls:""}},[e("source",{attrs:{src:t.video}})]):t._e()]:t._e(),e("div",{class:t.classesText},[e("h1",[e("k-writer",{ref:"input",class:t.classesHeading,attrs:{inline:!0,marks:!0,placeholder:t.headingField.placeholder||"Headline\u2026",value:t.content.heroheading},on:{input:function(i){return t.update({heroheading:i})}}})],1),this.content.herotext?e("k-writer",{attrs:{inline:!0,value:t.content.herotext},on:{input:function(i){return t.update({herotext:i})}}}):t._e()],1)],2)},jt=[];const St={computed:{classes(){return"k-custom-block k-block-type-hero k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" "+this.content.heromediatype+" block-width-"+this.content.width},video(){return this.content.herovideo[0]?this.content.herovideo[0].url:!1},classesImg(){return"k-block-align-"+this.content.aligncontent+" k-block-type-hero-media"},classesHeading(){return"k-block-type-heading-"+this.content.level},classesText(){return"hero-text k-block-align-"+this.content.aligncontent+" k-block-type-hero-text"},headingField(){return this.field("heroheading")||""}}},g={};var Mt=s(St,Rt,jt,!1,Et,null,null,null);function Et(t){for(let n in g)this[n]=g[n]}var It=function(){return Mt.exports}(),Tt=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-block-figure",{attrs:{"is-empty":!t.svgcode,"empty-text":t.$t("add-code"),"empty-icon":"file-code"},on:{open:t.open,update:t.update}},[e("div",{staticClass:"icon",domProps:{innerHTML:t._s(t.svgcode)}})])],1)},Ht=[];const qt={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},svgcode(){return this.content.svgcode?this.content.svgcode:!1}}},$={};var Bt=s(qt,Tt,Ht,!1,Pt,null,null,null);function Pt(t){for(let n in $)this[n]=$[n]}var Vt=function(){return Bt.exports}(),Dt=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-block-figure",{attrs:{"is-empty":!t.url,"empty-text":t.$t("add-code"),"empty-icon":"file-code"},on:{open:t.open,update:t.update}},[t.url?e("k-text",[t._v(" "+t._s(t.content.url)+" ")]):t._e()],1)],1)},Ot=[];const zt={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},url(){return this.content.url?this.content.url:!1}}},x={};var Gt=s(zt,Dt,Ot,!1,Lt,null,null,null);function Lt(t){for(let n in x)this[n]=x[n]}var Nt=function(){return Gt.exports}(),Ut=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("k-block-figure",{attrs:{"is-empty":!t.image.url,"empty-text":t.$t("no-image-selected"),"empty-icon":"image"},on:{open:t.open,update:t.update}},[e("div",{class:t.classes,on:{dblclick:t.open}},[t.image.url?e("img",{staticClass:"k-simple-image",attrs:{src:t.image.url}}):t._e()])])},Xt=[];const Qt={computed:{image(){return this.content.source[0]||{}},classes(){return"k-block-image k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width}}},y={};var Wt=s(Qt,Ut,Xt,!1,At,null,null,null);function At(t){for(let n in y)this[n]=y[n]}var Jt=function(){return Wt.exports}(),Kt=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-writer",{ref:"text",class:t.classes,attrs:{inline:!0,placeholder:t.placeholder,value:t.content.text},on:{input:function(i){return t.update({text:i})}}})],1)},Yt=[];const Zt={computed:{classes(){return"k-custom-block k-block-type-info-"+this.content.context+" k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},placeholder(){return this.field("text",{}).placeholder}}},w={};var te=s(Zt,Kt,Yt,!1,ee,null,null,null);function ee(t){for(let n in w)this[n]=w[n]}var ne=function(){return te.exports}(),ie=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-input",{ref:"text",attrs:{buttons:!1,placeholder:t.placeholder,value:t.content.text,type:"textarea"},on:{click:t.open,input:function(i){return t.update({text:i})}}})],1)},se=[];const oe={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" k-block-type-markdown-text block-width-"+this.content.width},placeholder(){return this.field("text",{}).placeholder}}},F={};var ce=s(oe,ie,se,!1,re,null,null,null);function re(t){for(let n in F)this[n]=F[n]}var le=function(){return ce.exports}(),ae=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("h2",{staticClass:"k-block-type-heading"},[e("k-writer",{ref:"input",attrs:{inline:!0,marks:!0,placeholder:t.headingField.placeholder||"Headline\u2026",value:t.content.heading},on:{input:function(i){return t.update({heading:i})}}})],1),t.items.length?e("div",[e("dl",{class:t.dlClasses},[t._l(t.items,function(i,o){return[e("dt",{key:o},[e("k-writer",{ref:"dtitle",refInFor:!0,attrs:{inline:!0,marks:!0,value:i.dt},on:{input:function(l){return t.updateItem(t.content,o,"dt",l)}}})],1),e("dd",{key:o},[e("k-writer",{ref:"ddesc",refInFor:!0,attrs:{marks:!0,value:i.dd},on:{input:function(l){return t.updateItem(t.content,o,"dd",l)}}})],1)]})],2)]):e("div",[t._v(t._s(t.$t("empty")))])])},ue=[];const de={computed:{items(){return this.content.dlist||{}},headingField(){return this.field("heading")},classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},dlClasses(){return"k-dlist "+this.content.orientation}},methods:{updateItem(t,n,e,i){t.dlist[n][e]=i,this.$emit("update",_(_({},this.content),t))}}},C={};var _e=s(de,ae,ue,!1,he,null,null,null);function he(t){for(let n in C)this[n]=C[n]}var ke=function(){return _e.exports}(),pe=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[t.empty?e("figure",{staticClass:"k-block-figure",on:{click:t.open}},[e("button",{staticClass:"k-block-figure-empty k-button",attrs:{type:"button"}},[e("span",{staticClass:"k-button-icon k-icon k-icon-template",attrs:{"aria-hidden":"true"}},[e("svg",{attrs:{viewBox:"0 0 16 16"}},[e("use",{attrs:{"xlink:href":"#icon-template"}})])]),e("span",{staticClass:"k-button-text"},[t._v(" "+t._s(t.$t("pricing")))])])]):e("div",[this.content.iconimage[0]?e("img",{attrs:{src:this.content.iconimage[0].url},on:{dblclick:t.open}}):t._e(),this.content.heading?e("k-writer",{staticClass:"k-block-type-pricing-heading",attrs:{inline:!0,marks:t.marksHeading,value:t.content.heading},on:{input:function(i){return t.update({heading:i})}}}):t._e(),this.content.price?e("k-writer",{staticClass:"k-block-type-pricing-price",attrs:{inline:!0,marks:t.marksPrice,value:t.content.price},on:{input:function(i){return t.update({price:i})}}}):t._e(),this.content.pricedetails?e("k-writer",{staticClass:"k-block-type-pricing-price-details",attrs:{inline:!0,marks:t.marksPriceDetails,value:t.content.pricedetails},on:{input:function(i){return t.update({pricedetails:i})}}}):t._e(),this.content.text?e("k-writer",{staticClass:"k-block-type-pricing-text",attrs:{inline:!0,value:t.content.text},on:{input:function(i){return t.update({text:i})}}}):t._e(),this.content.features?e("k-input",{staticClass:"k-block-type-pricing-features",attrs:{value:t.content.features,type:"list"},on:{input:function(i){return t.update({features:i})}}}):t._e(),this.content.buttontext?e("button",{class:t.classesButton,attrs:{type:"button"},on:{click:t.open}},[t._v(t._s(t.content.buttontext))]):t._e()],1)])},ve=[];const me={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},classesButton(){return this.content.buttonfullwidth===!0?"k-button-custom k-block-button-style-"+this.content.buttonstyle+" k-block-full-width":"k-button-custom k-block-button-style-"+this.content.buttonstyle},empty(){return!this.content.buttontext&&!this.content.features&&!this.content.heading&&!this.content.iconimage[0]&&!this.content.price&&!this.content.text},marksHeading(){return this.field("heading",{}).marks},marksPrice(){return this.field("price",{}).marks},marksPriceDetails(){return this.field("pricedetails",{}).marks}}},R={};var fe=s(me,pe,ve,!1,be,null,null,null);function be(t){for(let n in R)this[n]=R[n]}var ge=function(){return fe.exports}(),$e=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-writer",{ref:"text",staticClass:"k-block-type-quote-text",attrs:{inline:!0,marks:t.textField.marks,placeholder:t.textField.placeholder,value:t.content.text},on:{input:function(i){return t.update({text:i})}}}),e("k-writer",{ref:"citation",staticClass:"k-block-type-quote-citation",attrs:{inline:!0,marks:t.citationField.marks,placeholder:t.citationField.placeholder,value:t.content.citation},on:{input:function(i){return t.update({citation:i})}}})],1)},xe=[];const ye={computed:{citationField(){return this.field("citation",{})},textField(){return this.field("text",{})},classes(){return"k-custom-block k-block-type-quote-editor k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width}},methods:{focus(){this.$refs.text.focus()}}},j={};var we=s(ye,$e,xe,!1,Fe,null,null,null);function Fe(t){for(let n in j)this[n]=j[n]}var Ce=function(){return we.exports}(),Re=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"k-custom-block k-block-align-center",on:{dblclick:t.open}},[e("k-button",{attrs:{text:t.$t("spacer"),icon:"expand"},on:{dblclick:t.open}})],1)},je=[];const Se={},S={};var Me=s(Se,Re,je,!1,Ee,null,null,null);function Ee(t){for(let n in S)this[n]=S[n]}var Ie=function(){return Me.exports}(),Te=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes},[e("k-headline",{attrs:{tag:"h6"}},[t._v(t._s(t.$t("table")))]),t.table.length?e("div",{domProps:{innerHTML:t._s(t.createTable(t.content.table))},on:{click:t.open}}):e("figure",{staticClass:"k-block-figure",on:{click:t.open}},[e("button",{staticClass:"k-block-figure-empty k-block-figure-source k-button",attrs:{type:"button"}},[e("span",{staticClass:"k-button-icon k-icon k-icon-draft",attrs:{"aria-hidden":"true"}},[e("svg",{attrs:{viewBox:"0 0 16 16"}},[e("use",{attrs:{"xlink:href":"#icon-draft"}})])]),e("span",{staticClass:"k-button-text"},[t._v(t._s(t.$t("table"))+"...")])])])],1)},He=[];const qe={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},table(){return this.content.table||{}}},methods:{createTable(t){for(var n="<table class='k-block-table'>",e=0;e<t.length;e++){n+="<tr>";for(var i=0;i<t[e].length;i++)n+="<td>"+t[e][i]+"</td>";n+="</tr>"}return n+="</table>",n}}},M={};var Be=s(qe,Te,He,!1,Pe,null,null,null);function Pe(t){for(let n in M)this[n]=M[n]}var Ve=function(){return Be.exports}(),De=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[t.image.url?e("img",{staticClass:"k-simple-image",attrs:{src:t.image.url}}):t._e(),e("h2",{staticClass:"k-block-type-card-heading"},[e("k-writer",{ref:"input",attrs:{inline:!0,marks:!0,placeholder:t.headingField.placeholder||"Headline\u2026",value:t.content.heading},on:{input:function(i){return t.update({heading:i})}}})],1),e("div",{staticClass:"k-block-type-card-text"},[e("k-writer",{ref:"text",attrs:{inline:t.textField.inline,marks:t.textField.marks,placeholder:t.textField.placeholder||"Text\u2026",value:t.content.text},on:{input:function(i){return t.update({text:i})}}})],1),t.content.linkfield.length!=0?e("button",{staticClass:"k-button-custom",attrs:{type:"button"},on:{dblclick:t.open}},[t._v(t._s(t.content.linkfield[0].linktitle))]):t._e()])},Oe=[];const ze={computed:{headingField(){return this.field("heading")||""},textField(){return this.field("text")||""},image(){return this.content.image[0]||{}},classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width}}},E={};var Ge=s(ze,De,Oe,!1,Le,null,null,null);function Le(t){for(let n in E)this[n]=E[n]}var Ne=function(){return Ge.exports}(),Ue=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("blockquote",{staticClass:"k-custom-block k-block-type-testimonial-quote",on:{dblclick:t.open}},[e("k-writer",{ref:"quote",attrs:{inline:!0,marks:!1,value:t.content.quote,placeholder:t.quoteField.placeholder},on:{input:function(i){return t.update({quote:i})}}}),e("footer",[e("figure",{staticClass:"k-block-type-testimonial-voice"},[t.image.url?e("img",{attrs:{src:t.image.url,width:"48px",height:"48px",alt:"Photo of "+t.content.name}}):t._e(),e("figcaption",[t._v(" "+t._s(t.content.name)),e("br"),t._v(" "+t._s(t.bio)+" ")])])])],1)])},Xe=[];const Qe={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},image(){return this.content.image[0]||{}},bio(){return[this.content.jobposition,this.content.company].filter(t=>t!=null&&t!="").join(", ")},quoteField(){return this.field("quote")}}},I={};var We=s(Qe,Ue,Xe,!1,Ae,null,null,null);function Ae(t){for(let n in I)this[n]=I[n]}var Je=function(){return We.exports}(),Ke=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes},[e("k-writer",{ref:"text",attrs:{placeholder:t.placeholder,value:t.content.text},on:{input:function(i){return t.update({text:i})}}})],1)},Ye=[];const Ze={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},placeholder(){return this.field("text",{}).placeholder}}},T={};var tn=s(Ze,Ke,Ye,!1,en,null,null,null);function en(t){for(let n in T)this[n]=T[n]}var nn=function(){return tn.exports}(),sn=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-block-figure",{attrs:{"is-empty":!t.media,"empty-text":t.$t("select-video"),"empty-icon":"video"},on:{open:t.open,update:t.update}},[t.media?e("video",{attrs:{controls:""}},[e("source",{attrs:{src:t.media}})]):t._e()])],1)},on=[];const cn={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},media(){return this.content.media[0]?this.content.media[0].url:!1}}},H={};var rn=s(cn,sn,on,!1,ln,null,null,null);function ln(t){for(let n in H)this[n]=H[n]}var an=function(){return rn.exports}(),un=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{class:t.classes,on:{dblclick:t.open}},[e("k-block-figure",{attrs:{"is-empty":!t.url,"empty-text":t.$t("select-video"),"empty-icon":"youtube"},on:{open:t.open,update:t.update}},[t.url?e("iframe",{attrs:{src:t.url}}):t._e()])],1)},dn=[];const _n={computed:{classes(){return"k-custom-block k-block-align-"+this.content.alignblock+" k-content-align-"+this.content.aligncontent+" block-width-"+this.content.width},url(){if(this.content.url){var t=this.content.url,n=/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/,e=t.match(n);if(e)return"https://www.youtube.com/embed/"+e[2]}return!1}}},q={};var hn=s(_n,un,dn,!1,kn,null,null,null);function kn(t){for(let n in q)this[n]=q[n]}var pn=function(){return hn.exports}(),xn="";panel.plugin("fz/nova-blocks",{blocks:{accordion:N,accordionitem:J,blurb:nt,button:lt,carousel:kt,form:gt,gallery:Ct,hero:It,icon:Vt,iframe:Nt,image:Jt,info:ne,markdown:le,openingtimes:ke,pricing:ge,quote:Ce,spacer:Ie,table:Ve,teaser:Ne,testimonial:Je,text:nn,video:an,videoembed:pn}})})();
