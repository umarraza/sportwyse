import{o as m,e as f,a as c,k as p,H as a,t as x,n as d,F as O,i as v,r as I,f as b,Y as w}from"./app-52cb912a.js";const i={openOptions(e){e.$refs.input.focus(),e.showMenu=!0,e.mousedownState=!1},blurInput(e){e.mousedownState||(e.searchText="",e.closeOptions()),e.$emit("blur")},closeOptions(e){e.$refs.input.blur(),e.showMenu=!1},prevItem(e){const t=e.pointer-1,o=e.$el.offsetHeight*t;t>=0&&(e.pointer=t),e.$refs.menu.scrollTop=o},nextItem(e){const t=e.pointer+1,o=e.$el.offsetHeight*t;t<=e.filteredOptions.length-1&&(e.pointer=t);const u=e.$refs.menu.offsetHeight,r=Math.ceil((e.$refs.menu.scrollTop+e.$el.offsetHeight)/u),s=Math.ceil(o/u);r!==s&&(e.$refs.menu.scrollTop=(s-1)*e.$refs.menu.offsetHeight)},enterItem(e){const t=e.filteredOptions[e.pointer],o=t.disabled;t&&!o&&e.selectItem(t)},pointerSet(e,t){e.pointer=t},pointerAdjust(e){e.pointer>=e.filteredOptions.length-1&&(e.pointer=e.filteredOptions.length?e.filteredOptions.length-1:0)},mousedownItem(e){e.mousedownState=!0}};function y(e){return new RegExp(e.replace(/[.*+?^${}()|[\]\\]/g,"\\$&"),"i")}const T={props:{id:{default:null},name:{type:String,default:""},isError:{type:Boolean,default:!1},customAttr:{type:Function,default:()=>""},isDisabled:{type:Boolean,default:!1},placeholder:{type:String,default:""},filterPredicate:{type:Function,default:(e,t)=>e.match(y(t))}}},g=(e,t)=>{const o=e.__vccOpts||e;for(const[u,r]of t)o[u]=r;return o},S={name:"ModelSelect",mixins:[T],emits:["blur","searchchange","update:modelValue"],props:{modelValue:{type:[String,Number,Object,Boolean]},customAttr:{type:Function,default:()=>""},options:{type:Array}},data(){return{showMenu:!1,searchText:"",mousedownState:!1,pointer:-1}},watch:{value(e){this.pointer=this.filteredOptions.findIndex(t=>t.value===this.optionValue(e))},filteredOptions(){this.pointerAdjust()},searchText(){this.$emit("searchchange",this.searchText)}},computed:{searchTextCustomAttr(){return this.selectedOption&&this.selectedOption.value?this.customAttr(this.selectedOption):""},inputText(){if(this.searchText)return"";{let e=this.placeholder;return this.selectedOption&&(e=this.selectedOption.text),e}},customAttrs(){try{if(Array.isArray(this.options))return this.options.map(e=>this.customAttr(e))}catch{}return[]},textClass(){return!this.selectedOption&&this.placeholder?"default":""},menuClass(){return{visible:this.showMenu,hidden:!this.showMenu}},menuStyle(){return{display:this.showMenu?"block":"none"}},filteredOptions(){return this.searchText?this.options.filter(e=>{try{return this.filterPredicate(e.text,this.searchText)}catch{return!0}}):this.options},selectedOption(){return this.options.find(e=>e.value===this.optionValue(this.modelValue))}},methods:{deleteTextOrItem(){!this.searchText&&this.modelValue&&(this.selectItem({}),this.openOptions())},openOptions(){i.openOptions(this)},blurInput(){i.blurInput(this)},closeOptions(){i.closeOptions(this)},prevItem(){i.prevItem(this)},nextItem(){i.nextItem(this)},enterItem(){i.enterItem(this)},pointerSet(e){i.pointerSet(this,e)},pointerAdjust(){i.pointerAdjust(this)},mousedownItem(){i.mousedownItem(this)},selectItem(e){this.searchText="",this.closeOptions(),typeof this.modelValue=="object"&&this.modelValue?this.$emit("update:modelValue",e):(this.$emit("update:modelValue",e.value),e.value!==void 0&&e.value===e.text&&(this.searchText=e.value))},optionValue(e){return typeof e=="object"&&e!==null?e.value:e}}},$=c("i",{class:"dropdown icon"},null,-1),A=["disabled","tabindex","id","name","value"],M=["data-vss-custom-attr"],V=["data-vss-custom-attr","onClick","onMouseenter"];function C(e,t,o,u,r,s){return m(),f("div",{class:d(["ui fluid search selection dropdown",{"active visible":r.showMenu,error:e.isError,disabled:e.isDisabled}]),onClick:t[11]||(t[11]=(...n)=>s.openOptions&&s.openOptions(...n)),onFocus:t[12]||(t[12]=(...n)=>s.openOptions&&s.openOptions(...n))},[$,c("input",{class:"search",autocomplete:"off",disabled:e.isDisabled,tabindex:e.isDisabled?-1:0,id:e.id,name:e.name,value:r.searchText,onInput:t[0]||(t[0]=n=>r.searchText=n.target.value),ref:"input",onFocus:t[1]||(t[1]=p((...n)=>s.openOptions&&s.openOptions(...n),["prevent"])),onKeyup:[t[2]||(t[2]=a((...n)=>s.closeOptions&&s.closeOptions(...n),["esc"])),t[7]||(t[7]=a(p((...n)=>s.enterItem&&s.enterItem(...n),["prevent"]),["enter"]))],onBlur:t[3]||(t[3]=(...n)=>s.blurInput&&s.blurInput(...n)),onKeydown:[t[4]||(t[4]=a((...n)=>s.prevItem&&s.prevItem(...n),["up"])),t[5]||(t[5]=a((...n)=>s.nextItem&&s.nextItem(...n),["down"])),t[6]||(t[6]=a(p(()=>{},["prevent"]),["enter"])),t[8]||(t[8]=a((...n)=>s.deleteTextOrItem&&s.deleteTextOrItem(...n),["delete"]))]},null,40,A),c("div",{class:d(["text",s.textClass]),"data-vss-custom-attr":s.searchTextCustomAttr},x(s.inputText),11,M),c("div",{class:d(["menu",s.menuClass]),ref:"menu",onMousedown:t[10]||(t[10]=p(()=>{},["prevent"])),style:w(s.menuStyle),tabindex:"-1"},[(m(!0),f(O,null,v(s.filteredOptions,(n,l)=>(m(),f("div",{key:l,class:d(["item",{selected:n.selected||r.pointer===l,disabled:n.disabled}]),"data-vss-custom-attr":s.customAttrs[l]?s.customAttrs[l]:"",onClick:p(h=>s.selectItem(n),["stop"]),onMousedown:t[9]||(t[9]=(...h)=>s.mousedownItem&&s.mousedownItem(...h)),onMouseenter:h=>s.pointerSet(l)},[I(e.$slots,"default",{option:n,idx:l},()=>[b(x(n.text),1)])],42,V))),128))],38)],34)}const j=g(S,[["render",C]]);export{j as T};
