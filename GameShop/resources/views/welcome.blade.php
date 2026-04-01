<x-guest>
    <div
        class="relative min-h-screen overflow-hidden bg-[radial-gradient(1200px_650px_at_90%_-10%,rgba(217,31,38,0.14),transparent_70%),radial-gradient(1000px_600px_at_-10%_85%,rgba(14,16,20,0.08),transparent_72%)] text-slate-900 [font-family:Manrope,sans-serif]">
        <div class="mx-auto w-full max-w-7xl px-4 pb-10 pt-7 sm:px-6 lg:px-8">

            <section
                class="relative isolate grid min-h-[72vh] grid-cols-1 overflow-hidden rounded-[30px] bg-[linear-gradient(130deg,rgba(16,17,20,0.82)_12%,rgba(16,17,20,0.35)_58%,rgba(16,17,20,0.82)_100%),linear-gradient(180deg,#1a1c22,#2f333c)] shadow-[0_24px_50px_rgba(13,16,26,0.2)] md:grid-cols-2">
                <div
                    class="pointer-events-none absolute inset-0 -z-10 bg-[linear-gradient(0deg,rgba(16,17,20,0.78)_0%,rgba(16,17,20,0.06)_38%,rgba(16,17,20,0.78)_100%),repeating-linear-gradient(115deg,rgba(255,255,255,0.04)_0,rgba(255,255,255,0.04)_2px,rgba(255,255,255,0)_2px,rgba(255,255,255,0)_14px)]">
                </div>
                <div
                    class="pointer-events-none absolute -bottom-36 -right-24 -z-10 h-[460px] w-[460px] rounded-full bg-[radial-gradient(circle,rgba(217,31,38,0.42),rgba(217,31,38,0))] blur-md">
                </div>
                {{-- Left: text --}}
                <div class="flex items-end p-6 sm:p-10 md:p-14">
                    <div>
                        <span
                            class="mb-4 inline-flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.17em] text-slate-300 before:h-px before:w-8 before:bg-white/70">
                            Next-Level Tuning
                        </span>

                        <h1
                            class="text-balance [font-family:'Barlow_Condensed',sans-serif] text-5xl font-bold uppercase leading-[0.9] tracking-[0.02em] text-white sm:text-7xl md:text-8xl">
                            GAMESHOP | <span class="text-red-500">30M</span>
                        </h1>

                        <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-200 sm:text-lg sm:leading-8">
                            รับจัดสภาพ หาอะไหล่ เบิกอะไหล่แท้ ซ่อมรถ สอบถามอาการ พร้อมบริการหลังการขายที่คุณวางใจได้
                        </p>

                        <div class="mt-7 flex flex-wrap items-center gap-3">
                            <a href="{{ route('user.login') }}"
                                class="rounded-full bg-white px-5 py-3 text-xs font-bold uppercase tracking-[0.08em] text-slate-900 transition hover:-translate-y-0.5 hover:bg-slate-100">
                                ค้นหาสิ้นค้า
                            </a>
                            <a href="{{ route('user.login') }}"
                                class="rounded-full border border-white/40 px-5 py-3 text-xs font-bold uppercase tracking-[0.08em] text-white backdrop-blur-sm transition hover:border-white/80 hover:bg-white/10">
                                สมัครสมาชิก
                            </a>
                        </div>

                        <div class="mt-8 grid grid-cols-3 gap-3">
                            <article class="rounded-2xl border border-white/20 bg-white/10 p-4 text-white backdrop-blur-sm">
                                <p class="[font-family:'Barlow_Condensed',sans-serif] text-3xl leading-none tracking-[0.03em]">500+</p>
                                <p class="mt-1 text-xs tracking-[0.03em] text-slate-200">จำนวนสินค้า</p>
                            </article>
                            <article class="rounded-2xl border border-white/20 bg-white/10 p-4 text-white backdrop-blur-sm">
                                <p class="[font-family:'Barlow_Condensed',sans-serif] text-3xl leading-none tracking-[0.03em]">24/7</p>
                                <p class="mt-1 text-xs tracking-[0.03em] text-slate-200">การจัดส่งรวดเร็ว</p>
                            </article>
                            <article class="rounded-2xl border border-white/20 bg-white/10 p-4 text-white backdrop-blur-sm">
                                <p class="[font-family:'Barlow_Condensed',sans-serif] text-3xl leading-none tracking-[0.03em]">4.9/5</p>
                                <p class="mt-1 text-xs tracking-[0.03em] text-slate-200">คะแนนชุมชน</p>
                            </article>
                        </div>
                    </div>
                </div>

                {{-- Right: image --}}
                <div class="relative hidden items-end justify-center overflow-hidden md:flex">

                    <img
                        src="{{ asset('storage/image/hellogameshop.png') }}"
                        alt="GameShop"
                        class="h-full w-auto max-h-[90%] object-contain object-bottom drop-shadow-2xl rotate-[-21deg] transition-transform duration-300 hover:rotate-0"
                    >
                </div>
            </section>

            <section class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-3">
                <article class="rounded-2xl bg-white p-5 shadow-[0_8px_25px_rgba(12,16,26,0.08)]">
                    <h2 class="mb-2 text-xs font-bold uppercase tracking-[0.1em] text-slate-700">ยี่ห้อรถ</h2>
                    <p class="text-sm leading-6 text-slate-500">Honda Yamaha Suzuki Kawasaki</p>
                </article>
                <article class="rounded-2xl bg-white p-5 shadow-[0_8px_25px_rgba(12,16,26,0.08)]">
                    <h2 class="mb-2 text-xs font-bold uppercase tracking-[0.1em] text-slate-700">ชำระเงินทันใจ</h2>
                    <p class="text-sm leading-6 text-slate-500">
                        กระบวนการซื้อที่สะอาดเพื่อให้คุณไปจากการเรียกดูไปสู่การเล่นในไม่กี่นาที</p>
                </article>
                <article class="rounded-2xl bg-white p-5 shadow-[0_8px_25px_rgba(12,16,26,0.08)]">
                    <h2 class="mb-2 text-xs font-bold uppercase tracking-[0.1em] text-slate-700">
                        บริการที่เน้นผู้เล่นเป็นหลัก</h2>
                    <p class="text-sm leading-6 text-slate-500">
                        การสนับสนุนและคำแนะนำที่ปรับให้เหมาะกับสไตล์และแพลตฟอร์มของคุณ</p>
                </article>
            </section>
        </div>
    </div>
</x-guest>
