import{d as s,o as d,c as r,w as v,a as e,b as m,u as _,t as x}from"./app-18a9957e.js";import{T as p}from"./VueSearchSelect-089e00ed.js";import h from"./AppLayout-56e751b8.js";import"./Banner-7cea8ba6.js";import"./Sidebar-646431b3.js";import"./Header-26adc9d5.js";import"./DropdownLink-437aa870.js";const f={class:"row"},b={class:"col-md-12"},g={class:"card"},C=e("div",{class:"card-header"},null,-1),y={class:"card-body"},V={class:"ui vertical segment"},k={class:"flexbox"},w={class:"flex-content"},B=e("h3",null,"Handling Event sample",-1),D={class:"flex-result"},N={class:"ui celled table"},O=e("thead",null,[e("tr",null,[e("th",null,"value")])],-1),j={__name:"ModelSelect",setup(S){const l=s([{value:"1",text:"aa - 1"},{value:"2",text:"ab - 2"},{value:"3",text:"bc - 3"},{value:"4",text:"cd - 4"},{value:"5",text:"de - 5"},{value:"6",text:"ef - 6"},{value:"10",text:"ef - 10"},{value:"11",text:"ef - 11"},{value:"12",text:"ef - 12"},{value:"13",text:"down case - testcase"},{value:"14",text:"camel case - testCase"},{value:"15",text:"Capitalize case - Testcase"},{value:"16",text:"more a - 1"},{value:"17",text:"more a - 2"},{value:"18",text:"more a - 3"},{value:"19",text:"more a - 4"},{value:"20",text:"more a - 5"},{value:"21",text:"more a - 6"},{value:"22",text:"more a - 7"},{value:"23",text:"more a - 8"},{value:"24",text:"more a - 9"}]),t=s(""),u=()=>{t.value=""},n=()=>{t.value=l.value[0].value},c=a=>{console.log(a),t.value=a};return(a,o)=>(d(),r(h,{title:"Dashboard"},{default:v(()=>[e("div",f,[e("div",b,[e("div",g,[C,e("div",y,[e("div",V,[e("div",k,[e("div",w,[B,e("div",{class:"button-group"},[e("button",{type:"button",onClick:u,class:"small ui button"},"reset"),e("button",{type:"button",onClick:n,class:"small ui button"},"option select from parent")]),e("div",null,[m(_(p),{options:l.value,modelValue:t.value,"onUpdate:modelValue":o[0]||(o[0]=i=>t.value=i),onChange:c,placeholder:"placeholder text"},null,8,["options","modelValue"])])]),e("div",D,[e("table",N,[O,e("tbody",null,[e("tr",null,[e("td",null,x(t.value),1)])])])])])])])])])])]),_:1}))}};export{j as default};
