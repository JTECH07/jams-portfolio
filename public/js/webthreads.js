// WebThreads - WebGL Background Effect
// Version adaptée pour Laravel/HTML

class WebThreads {
    constructor(containerId, options = {}) {
        this.container = document.getElementById(containerId) || document.querySelector(containerId);
        if (!this.container) return;

        this.options = {
            color1: options.color1 || '#FFD700',
            color2: options.color2 || '#FFFFFF',
            color3: options.color3 || '#FFD700',
            speed: options.speed || 0.2,
            threadCount: options.threadCount || 4,
            frequency: options.frequency || 5.0,
            spread: options.spread || 0.18,
            taper: options.taper || 1.0,
            position: options.position || 0.5,
            fanMode: options.fanMode || 'center',
            glow: options.glow || 0.02,
            falloff: options.falloff || 0.6,
            thickness: options.thickness || 1.1,
            brightness: options.brightness || 0.6,
            opacity: options.opacity || 0.8,
            mirror: options.mirror !== false,
            grain: options.grain !== false,
            grainIntensity: options.grainIntensity || 0.03,
            mouseInteraction: options.mouseInteraction !== false,
            mouseStrength: options.mouseStrength || 0.3,
            ...options
        };

        this.init();
    }

    init() {
        this.createCanvas();
        this.initWebGL();
        this.setupShader();
        this.setupEventListeners();
        this.animate();
    }

    createCanvas() {
        this.canvas = document.createElement('canvas');
        this.canvas.style.position = 'absolute';
        this.canvas.style.top = '0';
        this.canvas.style.left = '0';
        this.canvas.style.width = '100%';
        this.canvas.style.height = '100%';
        this.canvas.style.zIndex = '0';
        this.canvas.style.pointerEvents = 'none';
        this.container.style.position = 'relative';
        this.container.appendChild(this.canvas);
    }

    initWebGL() {
        this.gl = this.canvas.getContext('webgl2', {
            alpha: true,
            premultipliedAlpha: true,
            antialias: false
        });

        if (!this.gl) {
            console.warn('WebGL2 not available, falling back to simpler background');
            this.createFallbackBackground();
            return;
        }

        const dpr = Math.min(window.devicePixelRatio || 1, 2);
        this.resize();
        window.addEventListener('resize', () => this.resize());

        this.gl.clearColor(0, 0, 0, 0);
    }

    createFallbackBackground() {
        this.canvas.style.display = 'none';
        
        const fallback = document.createElement('div');
        fallback.style.position = 'absolute';
        fallback.style.top = '0';
        fallback.style.left = '0';
        fallback.style.width = '100%';
        fallback.style.height = '100%';
        fallback.style.zIndex = '0';
        fallback.style.background = 'radial-gradient(ellipse at center, rgba(255,215,0,0.05) 0%, transparent 70%)';
        fallback.style.opacity = '0.5';
        
        this.container.appendChild(fallback);
    }

    hexToRgb(hex) {
        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        if (!result) return [1, 1, 1];
        return [
            parseInt(result[1], 16) / 255,
            parseInt(result[2], 16) / 255,
            parseInt(result[3], 16) / 255
        ];
    }

    setupShader() {
        if (!this.gl) return;

        const vertexShaderSource = `#version 300 es
            in vec2 position;
            void main() {
                gl_Position = vec4(position, 0.0, 1.0);
            }
        `;

        const fragmentShaderSource = `#version 300 es
            precision highp float;
            uniform vec2 iResolution;
            uniform float iTime;
            uniform vec3 uColor1;
            uniform vec3 uColor2;
            uniform vec3 uColor3;
            uniform float uSpeed;
            uniform float uThreadCount;
            uniform float uFrequency;
            uniform float uSpread;
            uniform float uTaper;
            uniform float uPosition;
            uniform float uGlow;
            uniform float uFalloff;
            uniform float uThickness;
            uniform float uBrightness;
            uniform float uOpacity;
            uniform float uGrainIntensity;
            out vec4 fragColor;

            #define TAU 6.28318530718
            #define MAX_THREADS 10

            float glow(float x, float str, float dist) {
                return dist / pow(max(x, 1e-4), str);
            }

            void main() {
                vec2 uv = gl_FragCoord.xy / iResolution.xy;
                float n = max(uThreadCount, 1.0);
                
                float pinchX = 0.5;
                float spreadDx = uSpread * abs(uv.x - pinchX);
                float baseT = iTime * uSpeed;
                float tauOverN = TAU / n;
                
                float invThickness = 1.0 / max(uThickness, 0.01);
                float xFreq = uv.x * uFrequency;
                float yOff = uv.y - uPosition;
                float ciScale = n > 1.0 ? 1.0 / (n - 1.0) : 0.0;
                
                vec3 col = vec3(0.0);
                float gsum = 0.0;
                
                for (int idx = 0; idx < MAX_THREADS; idx++) {
                    float i = float(idx);
                    if (i >= n) break;
                    
                    float amplitude = spreadDx * (1.0 + i * uTaper);
                    float phase = (baseT + i * tauOverN);
                    
                    float sdf = abs(yOff + sin(xFreq + phase) * amplitude) * invThickness;
                    float g = glow(sdf, uFalloff, uGlow);
                    float ci = i * ciScale;
                    vec3 threadCol = mix(uColor1, uColor2, ci);
                    
                    col += g * threadCol;
                    gsum += g;
                }
                
                float coreAmt = smoothstep(0.5, 2.2, gsum);
                col = mix(col, uColor3 * gsum, coreAmt * 0.5);
                col *= uBrightness;
                
                float alpha = clamp(gsum, 0.0, 1.0) * uOpacity;
                vec3 outRgb = col * alpha;
                
                // Grain subtil
                if (uGrainIntensity > 0.0) {
                    float gv = (fract(sin(dot(gl_FragCoord.xy, vec2(12.9898, 78.233)) + iTime) * 43758.5453) - 0.5) * uGrainIntensity;
                    outRgb = clamp(outRgb + gv, 0.0, 1.0);
                }
                
                fragColor = vec4(outRgb, alpha);
            }
        `;

        const vertexShader = this.createShader(this.gl.VERTEX_SHADER, vertexShaderSource);
        const fragmentShader = this.createShader(this.gl.FRAGMENT_SHADER, fragmentShaderSource);
        
        this.program = this.gl.createProgram();
        this.gl.attachShader(this.program, vertexShader);
        this.gl.attachShader(this.program, fragmentShader);
        this.gl.linkProgram(this.program);

        if (!this.gl.getProgramParameter(this.program, this.gl.LINK_STATUS)) {
            console.error('Shader program failed to link:', this.gl.getProgramInfoLog(this.program));
            return;
        }

        this.gl.useProgram(this.program);

        // Create triangle geometry
        const positions = new Float32Array([-1, -1, 3, -1, -1, 3]);
        const positionBuffer = this.gl.createBuffer();
        this.gl.bindBuffer(this.gl.ARRAY_BUFFER, positionBuffer);
        this.gl.bufferData(this.gl.ARRAY_BUFFER, positions, this.gl.STATIC_DRAW);

        const positionLocation = this.gl.getAttribLocation(this.program, 'position');
        this.gl.enableVertexAttribArray(positionLocation);
        this.gl.vertexAttribPointer(positionLocation, 2, this.gl.FLOAT, false, 0, 0);

        // Set uniform locations
        this.uniforms = {
            iResolution: this.gl.getUniformLocation(this.program, 'iResolution'),
            iTime: this.gl.getUniformLocation(this.program, 'iTime'),
            uColor1: this.gl.getUniformLocation(this.program, 'uColor1'),
            uColor2: this.gl.getUniformLocation(this.program, 'uColor2'),
            uColor3: this.gl.getUniformLocation(this.program, 'uColor3'),
            uSpeed: this.gl.getUniformLocation(this.program, 'uSpeed'),
            uThreadCount: this.gl.getUniformLocation(this.program, 'uThreadCount'),
            uFrequency: this.gl.getUniformLocation(this.program, 'uFrequency'),
            uSpread: this.gl.getUniformLocation(this.program, 'uSpread'),
            uTaper: this.gl.getUniformLocation(this.program, 'uTaper'),
            uPosition: this.gl.getUniformLocation(this.program, 'uPosition'),
            uGlow: this.gl.getUniformLocation(this.program, 'uGlow'),
            uFalloff: this.gl.getUniformLocation(this.program, 'uFalloff'),
            uThickness: this.gl.getUniformLocation(this.program, 'uThickness'),
            uBrightness: this.gl.getUniformLocation(this.program, 'uBrightness'),
            uOpacity: this.gl.getUniformLocation(this.program, 'uOpacity'),
            uGrainIntensity: this.gl.getUniformLocation(this.program, 'uGrainIntensity')
        };

        // Set initial uniform values
        this.updateUniforms();
    }

    createShader(type, source) {
        const shader = this.gl.createShader(type);
        this.gl.shaderSource(shader, source);
        this.gl.compileShader(shader);
        
        if (!this.gl.getShaderParameter(shader, this.gl.COMPILE_STATUS)) {
            console.error('Shader compilation failed:', this.gl.getShaderInfoLog(shader));
            this.gl.deleteShader(shader);
            return null;
        }
        
        return shader;
    }

    updateUniforms() {
        if (!this.gl || !this.uniforms) return;

        const rgb1 = this.hexToRgb(this.options.color1);
        const rgb2 = this.hexToRgb(this.options.color2);
        const rgb3 = this.hexToRgb(this.options.color3);

        this.gl.uniform2f(this.uniforms.iResolution, this.canvas.width, this.canvas.height);
        this.gl.uniform3f(this.uniforms.uColor1, rgb1[0], rgb1[1], rgb1[2]);
        this.gl.uniform3f(this.uniforms.uColor2, rgb2[0], rgb2[1], rgb2[2]);
        this.gl.uniform3f(this.uniforms.uColor3, rgb3[0], rgb3[1], rgb3[2]);
        this.gl.uniform1f(this.uniforms.uSpeed, this.options.speed);
        this.gl.uniform1f(this.uniforms.uThreadCount, this.options.threadCount);
        this.gl.uniform1f(this.uniforms.uFrequency, this.options.frequency);
        this.gl.uniform1f(this.uniforms.uSpread, this.options.spread);
        this.gl.uniform1f(this.uniforms.uTaper, this.options.taper);
        this.gl.uniform1f(this.uniforms.uPosition, this.options.position);
        this.gl.uniform1f(this.uniforms.uGlow, this.options.glow);
        this.gl.uniform1f(this.uniforms.uFalloff, this.options.falloff);
        this.gl.uniform1f(this.uniforms.uThickness, this.options.thickness);
        this.gl.uniform1f(this.uniforms.uBrightness, this.options.brightness);
        this.gl.uniform1f(this.uniforms.uOpacity, this.options.opacity);
        this.gl.uniform1f(this.uniforms.uGrainIntensity, this.options.grain ? this.options.grainIntensity : 0.0);
    }

    resize() {
        if (!this.gl) return;

        const rect = this.container.getBoundingClientRect();
        const width = Math.max(1, Math.floor(rect.width));
        const height = Math.max(1, Math.floor(rect.height));

        this.canvas.width = width;
        this.canvas.height = height;
        this.gl.viewport(0, 0, width, height);

        if (this.uniforms && this.uniforms.iResolution) {
            this.gl.uniform2f(this.uniforms.iResolution, width, height);
        }
    }

    setupEventListeners() {
        if (this.options.mouseInteraction && this.gl) {
            this.mouse = { x: 0.5, y: 0.5 };
            
            this.container.addEventListener('mousemove', (e) => {
                const rect = this.container.getBoundingClientRect();
                this.mouse.x = (e.clientX - rect.left) / rect.width;
                this.mouse.y = 1.0 - (e.clientY - rect.top) / rect.height;
            });

            this.container.addEventListener('mouseenter', () => {
                this.container.style.cursor = 'none';
            });

            this.container.addEventListener('mouseleave', () => {
                this.mouse.x = 0.5;
                this.mouse.y = 0.5;
                this.container.style.cursor = 'default';
            });
        }
    }

    animate(time = 0) {
        if (!this.gl || !this.program) {
            requestAnimationFrame((t) => this.animate(t));
            return;
        }

        this.gl.clear(this.gl.COLOR_BUFFER_BIT);
        
        if (this.uniforms && this.uniforms.iTime) {
            this.gl.uniform1f(this.uniforms.iTime, time * 0.001);
        }

        this.gl.drawArrays(this.gl.TRIANGLES, 0, 3);
        requestAnimationFrame((t) => this.animate(t));
    }

    updateOptions(newOptions) {
        this.options = { ...this.options, ...newOptions };
        this.updateUniforms();
    }

    destroy() {
        if (this.gl) {
            this.gl.getExtension('WEBGL_lose_context')?.loseContext();
        }
        if (this.canvas && this.canvas.parentNode) {
            this.canvas.parentNode.removeChild(this.canvas);
        }
    }
}

// Export pour usage global
if (typeof window !== 'undefined') {
    window.WebThreads = WebThreads;
}