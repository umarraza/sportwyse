import{T as n,o as d,c as _,w as o,a as t,b as r,f as l,x as m,k as u}from"./app-8f30f156.js";import p from"./AppLayout-81deca66.js";import"./multiselect-6aeab587.js";import f from"./CancelButton-3b9b6bfb.js";/* empty css                                                         */import"./Banner-3d2772c1.js";import"./Sidebar-683ad1b0.js";import"./Header-8dd9c9cf.js";import"./DropdownLink-21f41d84.js";const h={class:"row"},b={class:"col-12"},v={class:"card"},y={class:"card-header"},k=t("h4",{class:"pl-2"},"Crate Player",-1),w={class:"card-header-right"},g={class:"card-body"},x=["onSubmit"],B={class:"form-group"},C=t("button",{type:"submit",class:"btn btn-primary waves-effect ml-1 waves-light"},"Submit",-1),P={__name:"Create",props:{staff:{type:Object,required:!0},errors:Object},setup(a){const s=a;s.staff;const i=n({status:"1",gender:"Male",name:"",staff:[],birth_year_start_date:new Date,birth_year_end_date:new Date}),c=()=>{s.errors={},i.transform(e=>({...e})).post(route("club.players.store"),{onFinish:e=>{console.log(e)}})};return(e,L)=>(d(),_(p,{title:"Creae Player"},{default:o(()=>[t("div",h,[t("div",b,[t("div",v,[t("div",y,[k,t("div",w,[r(m,{backToListRoute:e.route("club.players.index")},{default:o(()=>[l(" Back")]),_:1},8,["backToListRoute"])])]),t("div",g,[t("form",{onSubmit:u(c,["prevent"])},[t("div",B,[t("div",null,[r(f,{routeLink:e.route("club.players.index")},null,8,["routeLink"]),C])])],40,x)])])])])]),_:1}))}};export{P as default};