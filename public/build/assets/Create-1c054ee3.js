import k from"./AppLayout-99440373.js";import{x as P,l as x,d,M as L,s as c,o as m,c as V,w as u,a as e,t as M,b as _,f,e as b,i as A,p as C,A as B,F as S,R as T}from"./app-d1115d7c.js";import{s as F}from"./vue-multiselect.esm-9bf9ac95.js";import{_ as R}from"./_plugin-vue_export-helper-c27b6911.js";import"./Banner-95ea4352.js";import"./Sidebar-720cbfee.js";import"./Header-0c154906.js";import"./DropdownLink-c65e5ef3.js";const q={components:{AppLayout:k,BackToList:P,VueMultiselect:F,Link:x},props:{team:{type:Object,required:!0},players:{type:Object,required:!0},errors:{type:Object,required:!1}},setup(r){const t=d([]).value,n=r.players.map(a=>({id:a.id,name:a.name})),s=d([{name:"Vue.js",language:"JavaScript"},{name:"AdonisJs",language:"JavaScript"},{name:"Rails",language:"Ruby"},{name:"Sinatra",language:"Ruby"},{name:"Laravel",language:"PHP"},{name:"Phoenix",language:"Elixir"}]),i=d({id:"",status:"Primary"});return L(()=>{t.push(i.value)}),{playersArray:t,allPlayers:n,options:s,player:i,addMorePlayer:()=>{t.push({id:"",status:"Primary"})},removePlayer:a=>{t.splice(a,1)},submitForm:async()=>{try{T.post(route("staff.teams.add-player",r.team.id),{players:t})}catch(a){alert(a)}}}}},w={class:"form theme-form"},j={class:"row"},N={class:"col-12"},O={class:"card"},U={class:"card-header"},J=e("h4",{class:"pl-3"},"Add Players",-1),D={class:"card-subtitle font-14 pl-3 text-muted"},E={class:"card-header-right"},G={class:"card-body"},z={class:"col-md-1",style:{padding:"38px 0px 0px 15px !important"}},H=["onClick"],I={class:"col-md-5"},K={class:"form-group"},Q=e("label",{class:"col-form-label"},"Name",-1),W=e("div",{class:"txt-danger"}," This value is required ",-1),X={class:"col-md-5"},Y={class:"form-group"},Z=e("label",{class:"col-form-label"},"Status",-1),$=["onUpdate:modelValue"],ee=e("option",{value:"Primary"},"Primary",-1),te=e("option",{value:"Guest"},"Guest",-1),se=[ee,te],ae=e("div",{class:"txt-danger"}," This value is required ",-1),oe={class:"card-footer text-right"};function re(r,t,n,s,i,v){const p=c("BackToList"),y=c("VueMultiselect"),a=c("Link"),g=c("AppLayout");return m(),V(g,{title:"Camps"},{default:u(()=>[e("form",w,[e("div",j,[e("div",N,[e("div",O,[e("div",U,[J,e("h6",D,M(n.team.name),1),e("div",E,[_(p,{backToListRoute:r.route("club.camps.index")},{default:u(()=>[f(" Back")]),_:1},8,["backToListRoute"])])]),e("div",G,[(m(!0),b(S,null,A(s.playersArray,(o,h)=>(m(),b("div",{class:"row",key:h},[e("div",z,[e("i",{class:"fas fa-minus-circle",onClick:l=>s.removePlayer(h),style:{"font-size":"25px",color:"#ff005a9c",cursor:"pointer"}},null,8,H)]),e("div",I,[e("div",K,[Q,_(y,{modelValue:o.id,"onUpdate:modelValue":l=>o.id=l,options:s.allPlayers,"close-on-select":!0,"clear-on-select":!1,placeholder:"Select one",label:"name","track-by":"name"},null,8,["modelValue","onUpdate:modelValue","options"]),W])]),e("div",X,[e("div",Y,[Z,C(e("select",{class:"custom-select","onUpdate:modelValue":l=>o.status=l},se,8,$),[[B,o.status]]),ae])])]))),128))]),e("div",oe,[_(a,{href:r.route("staff.teams.index"),class:"btn btn-light"},{default:u(()=>[f(" Cancel ")]),_:1},8,["href"]),e("button",{type:"button",class:"btn btn-primary ml-1",onClick:t[0]||(t[0]=(...o)=>s.addMorePlayer&&s.addMorePlayer(...o))},"Add More"),e("button",{type:"button",class:"btn btn-success ml-1",onClick:t[1]||(t[1]=(...o)=>s.submitForm&&s.submitForm(...o))},"Submit")])])])])])]),_:1})}const pe=R(q,[["render",re]]);export{pe as default};
