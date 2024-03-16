import{d as c,T as f,o as y,e as g,a as t,k as S,t as s,b as u,w as _,u as n}from"./app-fdb81d13.js";import{T as m}from"./VueSearchSelect-5509f0f2.js";const w=["id","aria-labelledby"],C={class:"modal-dialog modal-lg"},N={class:"modal-content"},V={class:"modal-header"},x=["id"],E=t("button",{type:"button",class:"close","data-dismiss":"modal","aria-label":"Close"},[t("span",{"aria-hidden":"true"},"×")],-1),M={class:"modal-body"},$={class:"row"},k={class:"col-md-12"},B={class:"table"},D=t("th",null,"Customer Email",-1),T=t("th",null,"Player Name",-1),A=t("th",null,"Status",-1),O=["innerHTML"],P=t("th",null,"Event Name",-1),L=t("th",null,"Created Date",-1),j=t("th",null,"Customer ID",-1),I=t("th",null,"Invoice Number",-1),q=t("th",null,"Amount",-1),H=t("th",null,"Statement Descriptor",-1),U=t("th",null,"Customer Description",-1),z=t("th",null,"Application ID",-1),F={class:"row mt-5"},G={class:"col-md-6"},J={class:"form-group"},K=t("label",{class:"col-form-label"},"Event Name",-1),Q={class:"col-md-6"},R={class:"form-group"},W=t("label",{class:"col-form-label"},"Player Name",-1),X={class:"modal-footer"},Y=t("button",{type:"button",class:"btn btn-secondary waves-effect","data-dismiss":"modal"},"Close",-1),Z=["disabled"],ot={__name:"AssignEventAndPlayer",props:{prop_transaction:Object,prop_camps:Object,prop_players:Object},setup(p){const d=p;c(!1);const o=c(d.prop_transaction),i=f({transaction_id:d.prop_transaction.id,player_id:d.prop_transaction.player_id,camp_id:d.prop_transaction.camp_id}),h=d.prop_camps.map(e=>({value:e.id,text:e.name})),v=d.prop_players.map(e=>({value:e.id,text:e.user.name})),r=(e,l)=>{setTimeout(()=>{},10)},b=()=>{i.transform(e=>({...e})).patch(route("transaction.update",d.prop_transaction.id),{preserveState:!1,onSuccess:()=>{document.querySelector(`#myModal${d.prop_transaction.id} .close`).click();var e=document.querySelector(".modal-backdrop.fade.show");e&&e.parentNode.removeChild(e)}})};return(e,l)=>(y(),g("div",{id:`myModal${o.value.id}`,class:"modal fade",tabindex:"-1",role:"dialog","aria-labelledby":`myModalLabel${o.value.id}`,"aria-hidden":"true"},[t("div",C,[t("form",{onSubmit:S(b,["prevent"])},[t("div",N,[t("div",V,[t("h5",{class:"modal-title mt-0",id:`myModalLabel${o.value.id}`},"Assign Event & Player",8,x),E]),t("div",M,[t("div",$,[t("div",k,[t("table",B,[t("tr",null,[D,t("td",null,s(o.value.customer_email),1),T,t("td",null,s(o.value.description),1)]),t("tr",null,[A,t("td",{innerHTML:o.value.status_lebel},null,8,O),P,t("td",null,s(o.value.event_name??"-"),1)]),t("tr",null,[L,t("td",null,s(o.value.created_date),1),j,t("td",null,s(o.value.customer_id),1)]),t("tr",null,[I,t("td",null,s(o.value.invoice_number),1),q,t("td",null,s(o.value.amount),1)]),t("tr",null,[H,t("td",null,s(o.value.statement_descriptor),1),U,t("td",null,s(o.value.customer_description),1)]),t("tr",null,[z,t("td",null,s(o.value.application_id),1)])])])]),t("div",F,[t("div",G,[t("div",J,[K,u(n(m),{options:n(h),modelValue:n(i).camp_id,"onUpdate:modelValue":l[0]||(l[0]=a=>n(i).camp_id=a),placeholder:"Select Event",onBlur:l[1]||(l[1]=a=>r(e.index,e.item))},{default:_(({option:a})=>[t("span",null,s(a.text),1)]),_:1},8,["options","modelValue"])])]),t("div",Q,[t("div",R,[W,u(n(m),{options:n(v),modelValue:n(i).player_id,"onUpdate:modelValue":l[2]||(l[2]=a=>n(i).player_id=a),placeholder:"Select Player",onBlur:l[3]||(l[3]=a=>r(e.index,e.item))},{default:_(({option:a})=>[t("span",null,s(a.text),1)]),_:1},8,["options","modelValue"])])])])]),t("div",X,[Y,t("button",{type:"submit",class:"btn btn-primary waves-effect waves-light",disabled:n(i).processing},"Save changes",8,Z)])])],32)])],8,w))}};export{ot as default};