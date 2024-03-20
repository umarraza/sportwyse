import{T as y,s as i,o as V,c as w,w as f,a as e,b as l,f as n,x as k,k as x,p as d,y as m,u as t}from"./app-bbe1c370.js";import T from"./AppLayout-1aa9fd5f.js";import{s as D}from"./multiselect-657ba7f9.js";import S from"./CancelButton-a5705ca5.js";/* empty css                                                         */import"./Banner-738fcd90.js";import"./Sidebar-22bfaebe.js";import"./Header-6123d9e5.js";import"./DropdownLink-6a8d23f0.js";const U={class:"row"},B={class:"col-12"},I={class:"card"},L={class:"card-header"},C=e("h4",{class:"pl-2"},"Crate Team",-1),M={class:"card-header-right"},E={class:"card-body",style:{height:"60em"}},N={class:"form-group row"},F={class:"col-sm-10"},O={for:""},R={for:"",class:"ml-2"},$={class:"form-group row"},j={class:"col-sm-10"},P={for:""},Y={for:"",class:"ml-2"},q={class:"form-group row"},G={class:"col-sm-10"},z={class:"form-group row"},A=e("label",{class:"col-sm-2 col-form-label"},"Select Staff",-1),H={class:"col-sm-10"},J={class:"form-group row"},K=e("label",{for:"example-search-input",class:"col-sm-2 col-form-label"},"Birth Year Start Date",-1),Q={class:"col-sm-10"},W={class:"form-group row"},X=e("label",{for:"example-search-input",class:"col-sm-2 col-form-label"},"Birth Year End Date",-1),Z={class:"col-sm-10"},ee={class:"form-group"},te=e("button",{type:"submit",class:"btn btn-primary waves-effect ml-1 waves-light"},"Submit",-1),ce={__name:"Create",props:{staff:{type:Object,required:!0},errors:Object},setup(b){const u=b;let h=u.staff;const s=y({status:"1",gender:"Male",name:"",staff:[],birth_year_start_date:new Date,birth_year_end_date:new Date}),v=()=>{u.errors={},s.transform(r=>({...r})).post(route("club.teams.store"),{onFinish:r=>{console.log(r)}})};return(r,o)=>{const c=i("InputLabel"),g=i("TextInput"),p=i("InputError"),_=i("VueDatePicker");return V(),w(T,{title:"Creae Team"},{default:f(()=>[e("div",U,[e("div",B,[e("div",I,[e("div",L,[C,e("div",M,[l(k,{backToListRoute:r.route("club.teams.index")},{default:f(()=>[n(" Back")]),_:1},8,["backToListRoute"])])]),e("div",E,[e("form",{onSubmit:x(v,["prevent"])},[e("div",N,[l(c,{for:"status",class:"col-sm-2 col-form-label",value:"Status"}),e("div",F,[e("label",O,[d(e("input",{name:"type",type:"radio",value:"1","onUpdate:modelValue":o[0]||(o[0]=a=>t(s).status=a)},null,512),[[m,t(s).status]]),n(" Enable ")]),e("label",R,[d(e("input",{name:"type",type:"radio",value:"0","onUpdate:modelValue":o[1]||(o[1]=a=>t(s).status=a)},null,512),[[m,t(s).status]]),n(" Disable ")])])]),e("div",$,[l(c,{for:"name",class:"col-sm-2 col-form-label",value:"Gender"}),e("div",j,[e("label",P,[d(e("input",{name:"gender",type:"radio",value:"Male","onUpdate:modelValue":o[2]||(o[2]=a=>t(s).gender=a)},null,512),[[m,t(s).gender]]),n(" Male ")]),e("label",Y,[d(e("input",{name:"gender",type:"radio",value:"Female","onUpdate:modelValue":o[3]||(o[3]=a=>t(s).gender=a)},null,512),[[m,t(s).gender]]),n(" Female ")])])]),e("div",q,[l(c,{for:"name",class:"col-sm-2 col-form-label",value:"Team Name"}),e("div",G,[l(g,{id:"name",modelValue:t(s).name,"onUpdate:modelValue":o[4]||(o[4]=a=>t(s).name=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),l(p,{class:"mt-2",message:t(s).errors.name},null,8,["message"])])]),e("div",z,[A,e("div",H,[l(t(D),{modelValue:t(s).staff,"onUpdate:modelValue":o[5]||(o[5]=a=>t(s).staff=a),mode:"tags","close-on-select":!1,searchable:!0,placeholder:"Select Staff","create-option":!0,options:t(h)},null,8,["modelValue","options"]),l(p,{class:"mt-2",message:t(s).errors.staff},null,8,["message"])])]),e("div",J,[K,e("div",Q,[l(_,{position:"left","enable-time-picker":!1,modelValue:t(s).birth_year_start_date,"onUpdate:modelValue":o[6]||(o[6]=a=>t(s).birth_year_start_date=a),"auto-apply":""},null,8,["modelValue"])])]),e("div",W,[X,e("div",Z,[l(_,{position:"left","enable-time-picker":!1,modelValue:t(s).birth_year_end_date,"onUpdate:modelValue":o[7]||(o[7]=a=>t(s).birth_year_end_date=a),"auto-apply":""},null,8,["modelValue"])])]),e("div",ee,[e("div",null,[l(S,{routeLink:r.route("club.teams.index")},null,8,["routeLink"]),te])])],32)])])])])]),_:1})}}};export{ce as default};
